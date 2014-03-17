var BubbleInstantSearch = Class.create();
BubbleInstantSearch.prototype = {
    initialize: function(options) {
        this.options = Object.extend({
            url:                $('search_mini_form').action,
            searchElement:      $('search'),
            contentElement:     $$('.main-container')[0],
            delay:              250,
            onUpdateComplete:   function() {}
        }, options || {});

        if (this.options.searchElement) {
            this.timeout = null;
            this.current = ''; // contains current search query
            this.currentUrl = this.options.url; // will contain base url + search query
            this.options.searchElement.observe('keyup', this.onKeyUp.bindAsEventListener(this));
        }
    },
    getCurrentUrl: function() {
        return this.currentUrl;
    },
    search: function() {
        var q = this.options.searchElement.value;
        q = q ? q.trim() : '';
        if (!q.length || q == this.current) {
            return;
        }
        this.current = q;
        var element = this.options.contentElement;
        var self = this;
        new Ajax.Request(this.options.url, {
            method: 'get',
            requestHeaders: {
                'X-Instant-Search': '1'
            },
            parameters: {
                q: q
            },
            onCreate: function() {
                if ($$('.main')[0]) {
                    $$('.main')[0].style.opacity = .5;
                }
            },
            onSuccess: function(response) {
                var result = response.responseJSON;
                if (result.success && result.content) {
                    if (q == self.current) {
                        self.updateContent(result.content);
                        element.removeAttribute('class');
                        if ($$('.main')[0]) {
                            $$('.main')[0].style.opacity = 1;
                        }
                        self.currentUrl = self.options.url;
                        self.currentUrl += self.currentUrl.match(new RegExp('\\?')) ? '&' : '?';
                        self.currentUrl += 'q=' + q;
                        self.options.onUpdateComplete.call(self);
                    }
                }
            },
            onFailure: function() {
                setLocation(url);
            }
        });
    },
    delaySearch: function() {
        if (this.options.delay <= 0) {
            this.search();
        } else {
            if (this.timeout) {
                clearTimeout(this.timeout);
            }
            this.timeout = setTimeout(function() {
                this.search();
            }.bind(this), this.options.delay);
        }
    },
    updateContent: function(content) {
        if (this.options.contentElement) {
            this.options.contentElement.innerHTML = content;
        }
    },
    onKeyUp: function(event) {
        switch(event.keyCode) {
            case Event.KEY_ESC:
            case Event.KEY_DOWN:
            case Event.KEY_UP:
            case Event.KEY_RIGHT:
            case Event.KEY_LEFT:
            case Event.KEY_RETURN:
            case Event.KEY_TAB:
            case 91: // Mac cmd
                return;
        }

        this.delaySearch();
    }
};
if (!String.prototype.trim) {
    String.prototype.trim = function() {
        return this.replace(/^\s+|\s+$/g, '');
    }
}