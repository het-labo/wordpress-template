<script>
document.addEventListener("DOMContentLoaded", function () {
    const form = document.querySelector("#filter-form");
    const resultsContainer = document.querySelector("#units-results");
    const resetButton = document.querySelector("#reset-filters");
    const aanbodSection = document.querySelector("#aanbod");

    if (!form || !resultsContainer) return;

    function scrollToAanbod() {
        if (aanbodSection) {
            aanbodSection.scrollIntoView({ behavior: "smooth" });
        }
    }

    function fetchResults(pushHistory = true) {
        const params = new URLSearchParams(new FormData(form)).toString();
        const newUrl = window.location.pathname + (params ? "?" + params : "") + "#aanbod";

        if (pushHistory) {
            window.history.pushState({}, "", newUrl);
        }

        // Show loading state
        resultsContainer.classList.add("opacity-50");
        resultsContainer.style.pointerEvents = "none";

        fetch(window.location.pathname + (params ? "?" + params : "") + "&ajax=1")
            .then(res => res.text())
            .then(html => {
                resultsContainer.innerHTML = html;
                toggleResetButton(); // check visibility
                if (window.location.hash === "#aanbod") {
                    scrollToAanbod(); // scroll only if hash is present
                }
            })
            .catch(err => {
                resultsContainer.innerHTML =
                    '<div class="p-4 bg-red-100 text-red-700">Er ging iets mis bij het laden.</div>';
                console.error("Filter AJAX error:", err);
            })
            .finally(() => {
                resultsContainer.classList.remove("opacity-50");
                resultsContainer.style.pointerEvents = "";
            });
    }

    // Show/hide reset button based on filters
    function toggleResetButton() {
        if (!resetButton) return;
        const params = new URLSearchParams(new FormData(form));
        let hasFilters = false;

        for (const [key, value] of params.entries()) {
            if (value) {
                hasFilters = true;
                break;
            }
        }

        resetButton.style.display = hasFilters ? "inline-block" : "none";
    }

    // Re-run filter when user changes dropdowns or number fields
    form.querySelectorAll("select, input[type='number']").forEach(el => {
        el.addEventListener("change", () => fetchResults(true));
    });

    // Handle browser back/forward navigation
    window.addEventListener("popstate", () => {
        const params = new URLSearchParams(window.location.search);

        // Sync form values with current URL
        form.querySelectorAll("select, input[type='number']").forEach(el => {
            el.value = params.get(el.name) || "";
        });

        // Fetch results for this URL
        fetch(window.location.href + (window.location.search ? "&ajax=1" : "?ajax=1"))
            .then(res => res.text())
            .then(html => {
                resultsContainer.innerHTML = html;
                toggleResetButton();
                if (window.location.hash === "#aanbod") {
                    scrollToAanbod(); // scroll only if hash is present
                }
            })
            .catch(err => {
                resultsContainer.innerHTML =
                    '<div class="p-4 bg-red-100 text-red-700">Er ging iets mis bij het laden.</div>';
                console.error("Filter AJAX error:", err);
            });
    });

    // Reset filters
    if (resetButton) {
        resetButton.addEventListener("click", () => {
            // Clear all inputs
            form.querySelectorAll("select, input[type='number']").forEach(el => {
                if (el.tagName.toLowerCase() === "select") {
                    el.selectedIndex = 0; // reset to first option
                } else {
                    el.value = ""; // clear numbers
                }
            });

            // Update the URL (remove all query params but keep #aanbod)
            window.history.pushState({}, "", window.location.pathname + "#aanbod");

            // Reload results with no filters
            fetch(window.location.pathname + "?ajax=1")
                .then(res => res.text())
                .then(html => {
                    resultsContainer.innerHTML = html;
                    toggleResetButton(); // hides button again
                    scrollToAanbod();
                })
                .catch(err => {
                    resultsContainer.innerHTML =
                        '<div class="p-4 bg-red-100 text-red-700">Er ging iets mis bij het laden.</div>';
                    console.error("Filter AJAX error:", err);
                });
        });
    }


    // Init reset button visibility
    toggleResetButton();

    // 👇 Only auto-scroll if hash is explicitly set
    if (window.location.hash === "#aanbod") {
        scrollToAanbod();
    }
});
</script>
