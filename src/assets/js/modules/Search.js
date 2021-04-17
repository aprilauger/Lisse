/* eslint-disable no-useless-escape */
/**
 * Custom Search
 *
 * Adds a dynamic search to the theme.
 */
class Search {
    // Initiate object
    constructor() {
        this.addSearchHTML();
        this.results = document.getElementById('search-results');
        this.openBtn = document.getElementById('search-trigger');
        this.closeBtn = document.getElementById('search-overlay-close');
        this.searchOverlay = document.getElementById('search-overlay');
        this.searchTerm = document.getElementById('search-term');

        // Call events to add event listeners to the page
        this.events();

        this.isOverlayOpen = false;
        this.isSpinnerVisible = false;
        this.previousValue;
        this.typingTimer;
    }

    // Event handlers
    events() {
        this.openBtn.addEventListener('click', this.openOverlay.bind(this));
        this.closeBtn.addEventListener('click', this.closeOverlay.bind(this));
        document.addEventListener(
            'keydown',
            this.keyPressDispatcher.bind(this)
        );
        this.searchTerm.addEventListener('keyup', this.typingLogic.bind(this));
    }

    /**
     * TypingLogic
     */
    typingLogic() {
        if (this.searchTerm.value != this.previousValue) {
            clearTimeout(this.typingTimer);

            // Show the spinner when user is typing a search term
            if (this.searchTerm.value) {
                if (!this.isSpinnerVisible) {
                    this.results.innerHTML = '<div class="loader"></div>';
                    this.isSpinnerVisible = true;
                }

                // To prevent flooding the server
                this.typingTimer = setTimeout(
                    this.queryResults.bind(this),
                    750
                );

                // Hide the spinner when the search input is empty
            } else {
                this.results.innerText = '';
                this.isSpinnerVisible = false;
            }
        }

        // Search field value
        this.previousValue = this.searchTerm.value;
    }

    /**
     * QueryResults
     */
    queryResults() {
        // Fetch results from our custom API
        fetch(
            `${lisseData.root_url}/wp-json/lisse/v1/search?keyword=${this.searchTerm.value}`
        )
            // Convert response to json.
            .then((response) => {
                return response.json();
            })
            // Output the response
            .then((results) => {
                this.results.innerHTML = `
                <div class="row">
                    <div class="col-md-6">
                        <div class="results">Posts</div>
                        ${
                            results.posts.length
                                ? '<ul class="link-list">'
                                : `<p>No results returned for posts.</p>`
                        }
                        ${results.posts
                            .map(
                                (item) => `
                            <li class="card-list-item">
                                <div class="card-title">
                                    <a href="${encodeURI(
                                        item.permalink
                                    )}" title="${this.escapeHTML(
                                    item.title
                                )}">${this.escapeHTML(item.title)}</a> by ${
                                    item.author_name
                                }
                                </div>
                                <div class="published">Published on ${this.escapeHTML(
                                    item.date
                                )}</div>
                                <div class="description">${this.escapeHTML(
                                    this.truncate(item.description, 120)
                                )}</div>
                            </li>`
                            )
                            .join('')}
                        ${results.posts.length ? '</ul>' : ''}
                    </div>

                    <div class="col-md-6">
                        <div class="results">Pages</div>
                        ${
                            results.pages.length
                                ? '<ul class="link-list card-title">'
                                : `<p>No results returned for pages.</p>`
                        }
                        ${results.pages
                            .map(
                                (item) =>
                                    `<li><a href="${encodeURI(
                                        item.permalink
                                    )}" title="${this.escapeHTML(
                                        item.title
                                    )}">${this.escapeHTML(
                                        this.truncate(item.title, 50)
                                    )}</a></li>`
                            )
                            .join('')}
                        ${results.pages.length ? '</ul>' : ''}
                    </div>
                </div>`;
            })
            .catch((err) => {
                this.results.innerHTML =
                    err + '<p>Unexpected error, please try again.</p>';
            });

        this.isSpinnerVisible = false;
    }

    escapeHTML(unsafe_str) {
        return unsafe_str
            .replace(/&/g, '&amp;')
            .replace(/</g, '&lt;')
            .replace(/>/g, '&gt;')
            .replace(/\"/g, '&quot;')
            .replace(/\'/g, '&#39;')
            .replace(/\//g, '&#x2F;');
    }

    /**
     * GetJSON
     */
    getJSON(url, callback) {
        let xhr = new XMLHttpRequest();
        xhr.open('GET', url, true);
        xhr.responseType = 'json';
        xhr.onload = function () {
            let status = xhr.status;

            if (status === 200) {
                callback(null, xhr.response);
            } else {
                callback(status, xhr.response);
            }
        };
        xhr.send();
    }

    keyPressDispatcher(e) {
        if (e.keyCode == 27 && this.isOverlayOpen) {
            this.closeOverlay();
        }
    }

    /**
     * Open Overlay
     */
    openOverlay(e) {
        this.searchOverlay.classList.add('search-overlay-active');
        document.body.classList.add('body-no-scroll');
        this.searchTerm.value = '';
        setTimeout(() => this.searchTerm.focus(), 300);
        this.isOverlayOpen = true;
        e.preventDefault();
    }

    closeOverlay() {
        this.searchOverlay.classList.remove('search-overlay-active');
        document.body.classList.remove('body-no-scroll');
        this.isOverlayOpen = false;
    }

    addSearchHTML() {
        let search = document.createElement('div');
        search.innerHTML = `
            <div id="search-overlay">
                <div class="search-top">
                    <div class="container">
                        <i class="fa fa-search search-icon" aria-hidden="true"></i>
                        <input type="text" class="search-term" placeholder="Search" id="search-term">
                        <i id="search-overlay-close" class="fas fa-times" aria-hidden="true"></i>
                    </div>
                </div>
                <div class="container">
                    <div id="search-results">

                    </div>
                </div>
            </div>
            `;
        document.body.appendChild(search);
    }

    truncate(str, maxLength) {
        return str.length > maxLength
            ? str.substr(0, maxLength - 1) + '... '
            : str;
    }
}

export default Search;
