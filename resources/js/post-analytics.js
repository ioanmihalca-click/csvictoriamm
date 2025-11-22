// Post Analytics Tracking
class PostAnalytics {
    constructor() {
        this.postId = null;
        this.startTime = Date.now();
        this.isTracking = false;
        this.timeUpdateInterval = null;
    }

    // Initialize tracking for a post
    init(postId) {
        this.postId = postId;
        this.isTracking = true;
        this.startTracking();
        this.attachShareListeners();
    }

    // Start tracking time on page
    startTracking() {
        // Update time every 30 seconds while user is on page
        this.timeUpdateInterval = setInterval(() => {
            if (this.isTracking && !document.hidden) {
                this.sendTimeUpdate();
            }
        }, 30000); // 30 seconds

        // Track when user leaves the page
        window.addEventListener('beforeunload', () => {
            this.sendTimeUpdate();
        });

        // Track when tab becomes hidden/visible
        document.addEventListener('visibilitychange', () => {
            if (document.hidden) {
                this.sendTimeUpdate();
                this.isTracking = false;
            } else {
                this.startTime = Date.now();
                this.isTracking = true;
            }
        });
    }

    // Send time update to server
    sendTimeUpdate() {
        const timeSpent = Math.round((Date.now() - this.startTime) / 1000); // in seconds

        if (timeSpent > 5) { // Only track if more than 5 seconds
            fetch(`/api/posts/${this.postId}/track-time`, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')?.content || ''
                },
                body: JSON.stringify({ time: timeSpent })
            }).catch(err => console.error('Failed to track time:', err));
        }
    }

    // Attach listeners to share buttons
    attachShareListeners() {
        // Facebook share
        const fbButtons = document.querySelectorAll('[data-share="facebook"]');
        fbButtons.forEach(btn => {
            btn.addEventListener('click', (e) => {
                this.trackShare('facebook');
                // Don't prevent default - let the share happen
            });
        });

        // WhatsApp share
        const waButtons = document.querySelectorAll('[data-share="whatsapp"]');
        waButtons.forEach(btn => {
            btn.addEventListener('click', (e) => {
                this.trackShare('whatsapp');
            });
        });

        // LinkedIn share
        const liButtons = document.querySelectorAll('[data-share="linkedin"]');
        liButtons.forEach(btn => {
            btn.addEventListener('click', (e) => {
                this.trackShare('linkedin');
            });
        });

        // Generic share tracking for any element with data-share attribute
        document.addEventListener('click', (e) => {
            const shareElement = e.target.closest('[data-share]');
            if (shareElement) {
                const platform = shareElement.dataset.share;
                if (platform && ['facebook', 'whatsapp', 'linkedin', 'twitter', 'email'].includes(platform)) {
                    this.trackShare(platform);
                }
            }
        });
    }

    // Track a share event
    trackShare(platform) {
        if (!this.postId) return;

        fetch(`/api/posts/${this.postId}/track-share`, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')?.content || ''
            },
            body: JSON.stringify({ platform: platform })
        }).catch(err => console.error('Failed to track share:', err));
    }

    // Clean up
    destroy() {
        if (this.timeUpdateInterval) {
            clearInterval(this.timeUpdateInterval);
        }
        this.isTracking = false;
    }
}

// Export for use
window.PostAnalytics = PostAnalytics;

// Auto-initialize if on a blog post page
document.addEventListener('DOMContentLoaded', () => {
    const postElement = document.querySelector('[data-post-id]');
    if (postElement) {
        const postId = postElement.dataset.postId;
        const analytics = new PostAnalytics();
        analytics.init(postId);
    }
});