<!-- Notification Container -->
<div id="notification" class="fixed top-6 right-6 z-50 w-96 rounded-lg shadow-lg border-l-4 p-4 hidden">
    <div class="flex items-start gap-3">
        <!-- Icon -->
        <div id="notification-icon" class="flex-shrink-0 mt-0.5"></div>

        <!-- Text -->
        <div class="flex-1">
            <p id="notification-title" class="font-bold text-sm"></p>
            <p id="notification-message" class="text-sm mt-1"></p>
        </div>

        <!-- Close -->
        <button id="notification-close" class="ml-3 text-gray-400 hover:text-gray-600 font-bold">&times;</button>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', () => {
        // Ambil session message dari Laravel
        let type = '';
        let title = '';
        let message = '';

        @if(session('success'))
            type = 'success';
            title = 'Berhasil!';
            message = '{{ session('success') }}';
        @elseif(session('error'))
            type = 'error';
            title = 'Terjadi kesalahan!';
            message = '{{ session('error') }}';
        @elseif(session('info'))
            type = 'info';
            title = 'Info';
            message = '{{ session('info') }}';
        @elseif(session('warning'))
            type = 'warning';
            title = 'Peringatan!';
            message = '{{ session('warning') }}';
        @endif

        if(type && message) {
            const notification = document.getElementById('notification');
            const icon = document.getElementById('notification-icon');
            const titleEl = document.getElementById('notification-title');
            const messageEl = document.getElementById('notification-message');
            const closeBtn = document.getElementById('notification-close');

            // Set text
            titleEl.textContent = title;
            messageEl.textContent = message;

            // Set color & icon
            notification.className = 'fixed top-6 right-6 z-50 w-96 rounded-lg shadow-lg border-l-4 p-4';
            switch(type) {
                case 'success':
                    notification.classList.add('bg-green-50', 'border-green-500', 'text-green-700');
                    icon.innerHTML = `<svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
                                      </svg>`;
                    break;
                case 'error':
                    notification.classList.add('bg-red-50', 'border-red-500', 'text-red-700');
                    icon.innerHTML = `<svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                                      </svg>`;
                    break;
                case 'info':
                    notification.classList.add('bg-blue-50', 'border-blue-500', 'text-blue-700');
                    icon.innerHTML = `<svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M13 16h-1v-4h-1m1-4h.01M12 2a10 10 0 100 20 10 10 0 000-20z"/>
                                      </svg>`;
                    break;
                case 'warning':
                    notification.classList.add('bg-yellow-50', 'border-yellow-500', 'text-yellow-700');
                    icon.innerHTML = `<svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v2m0 4h.01M5.07 19h13.86l-6.93-12L5.07 19z"/>
                                      </svg>`;
                    break;
            }

            // Tampilkan notification
            notification.classList.remove('hidden');

            // Tutup otomatis setelah 5 detik
            setTimeout(() => {
                notification.classList.add('hidden');
            }, 5000);

            // Tutup manual
            closeBtn.addEventListener('click', () => {
                notification.classList.add('hidden');
            });
        }
    });
</script>
