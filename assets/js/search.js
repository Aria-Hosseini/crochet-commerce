document.addEventListener('DOMContentLoaded', function() {
    const searchInput = document.getElementById('searchbar');
    const searchResults = document.getElementById('liveSearchResults');
    let searchTimeout;

    searchInput.addEventListener('input', function(e) {
        const query = e.target.value.trim();
        
        clearTimeout(searchTimeout);
        
        if (query.length === 0) {
            hideResults();
            return;
        }
        
        searchTimeout = setTimeout(() => {
            searchProducts(query);
        }, 300);
    });

    document.addEventListener('click', function(e) {
        if (!searchInput.contains(e.target) && !searchResults.contains(e.target)) {
            hideResults();
        }
    });

    searchInput.addEventListener('keydown', function(e) {
        if (e.key === 'Escape') {
            hideResults();
            searchInput.blur();
        }
    });

    searchInput.addEventListener('focus', function() {
        if (searchInput.value.trim().length > 0) {
            searchProducts(searchInput.value.trim());
        }
    });

    function searchProducts(query) {
        if (query.length < 2) {
            showMessage('حداقل ۲ حرف وارد کنید');
            return;
        }

        showLoading();
        
        fetch(`functions/search-ajax.php?query=${encodeURIComponent(query)}`)
            .then(response => {
                if (!response.ok) throw new Error('خطا در ارتباط');
                return response.json();
            })
            .then(data => {
                if (data.length === 0) {
                    showMessage('محصولی یافت نشد');
                } else {
                    displayResults(data);
                }
            })
            .catch(error => {
                console.error('Error:', error);
                showMessage('خطا در دریافت اطلاعات');
            });
    }

    function displayResults(products) {
        searchResults.innerHTML = '';
        searchResults.classList.add('active');
        
        products.forEach(product => {
            const resultItem = document.createElement('a');
            resultItem.href = product.product_url;
            resultItem.className = 'search-result-item';
            resultItem.innerHTML = `
                <div class="search-result-content">
                    <div class="search-result-image">
                        <img src="${product.image_url}" alt="${product.title}" 
                             onerror="this.src='assets/images/default-product.jpg'">
                    </div>
                    <div class="search-result-info">
                        <span class="search-result-title">${highlightMatch(product.title, searchInput.value)}</span>
                        <span class="search-result-price">${product.formatted_price}</span>
                    </div>
                </div>
            `;
            searchResults.appendChild(resultItem);
        });
    }

    function showMessage(message) {
        searchResults.innerHTML = `
            <div class="search-message">
                <span>${message}</span>
            </div>
        `;
        searchResults.classList.add('active');
    }

    function showLoading() {
        searchResults.innerHTML = `
            <div class="search-loading">
                <div class="loading-spinner"></div>
                <span>در حال جستجو...</span>
            </div>
        `;
        searchResults.classList.add('active');
    }

    function hideResults() {
        searchResults.classList.remove('active');
    }

    function highlightMatch(text, query) {
        if (!query) return text;
        
        const regex = new RegExp(`(${query})`, 'gi');
        return text.replace(regex, '<mark>$1</mark>');
    }
});