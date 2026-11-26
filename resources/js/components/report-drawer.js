const table = document.querySelector('[data-report-table]');

const overlay = document.getElementById('report-detail-overlay');
const drawer = document.getElementById('report-detail-drawer');
const closeButton = document.getElementById('close-report-drawer');

const drawerFields = {
    'drawer-report-id': 'reportId',
    'drawer-category': 'category',
    'drawer-crime-level': 'severity',
    'drawer-status': 'status',
    'drawer-occurred-at': 'occurredAt',
    'drawer-reported-by': 'reportedBy',
    'drawer-station': 'station',
    'drawer-address': 'address',
    'drawer-description': 'description',
    'drawer-reported-at': 'reportedAt',
};

// Populate and open drawer
function openReportDrawer(report) {

    Object.entries(drawerFields).forEach(([elementId, dataKey]) => {

        let value = report[dataKey] || '--';

        if (elementId === 'drawer-status') {
            value = value.replace(/\b\w/g, char => char.toUpperCase());
        }

        document.getElementById(elementId).textContent = value;
    });

    overlay.classList.remove('hidden');

    requestAnimationFrame(() => {
        drawer.classList.remove('translate-x-full');
    });
}

// Table row click
if (table) {
    table.addEventListener('click', (event) => {

        // Ignore clicks on buttons that have separate actions
        if (event.target.closest('[data-no-row-click]')) {
            return;
        }

        const row = event.target.closest('[data-report-row]');

        if (!row) return;

        openReportDrawer(row.dataset);
    });
}

// Close drawer
function closeDrawer() {
    drawer.classList.add('translate-x-full');
    setTimeout(() => {
        overlay.classList.add('hidden');
    }, 300);
}

closeButton.addEventListener('click', closeDrawer);

// Close when clicking outside
overlay.addEventListener('click', (event) => {
    if (event.target === overlay) {
        closeDrawer();
    }
});

// Hide overlay after slide-out animation
drawer.addEventListener('transitionend', (event) => {
    if (
        event.propertyName === 'transform' &&
        drawer.classList.contains('translate-x-full')
    ) {
        overlay.classList.add('hidden');
    }
});

// Escape key
document.addEventListener('keydown', (event) => {
    if (event.key === 'Escape' && !overlay.classList.contains('hidden')) {
        closeDrawer();
    }
});