document.addEventListener('DOMContentLoaded', () => {
    // 1. Logika Scroll Header (Menambah background saat di-scroll)
    const navbar = document.getElementById('navbar');
    window.addEventListener('scroll', () => {
        if (window.scrollY > 50) {
            navbar.classList.add('shadow-lg');
            navbar.classList.replace('bg-black/40', 'bg-black/80');
        } else {
            navbar.classList.remove('shadow-lg');
            navbar.classList.replace('bg-black/80', 'bg-black/40');
        }
    });

    // 2. Active Nav Link saat Scroll menggunakan IntersectionObserver
    const sections = document.querySelectorAll('section, footer');
    const navLinks = document.querySelectorAll('.nav-link');

    const observerOptions = {
        root: null,
        rootMargin: '-50% 0px -50% 0px', // Memicu saat bagian tengah section ada di tengah viewport
        threshold: 0
    };

    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                // Hapus class active dari semua link
                navLinks.forEach(link => {
                    link.classList.remove('active', 'text-neonBlue');
                    link.style.textShadow = 'none';
                });

                // Tambahkan class active ke link yang sesuai
                const id = entry.target.getAttribute('id');
                const activeLink = document.querySelector(`.nav-link[href="#${id}"]`);
                if (activeLink) {
                    activeLink.classList.add('active');
                    activeLink.style.textShadow = '0 0 10px rgba(0, 243, 255, 0.8)';
                }
            }
        });
    }, observerOptions);

    sections.forEach(section => {
        observer.observe(section);
    });

    // 3. Logika Form Emailing (Simulasi)
    const contactForm = document.getElementById('contactForm');
    contactForm.addEventListener('submit', (e) => {
        e.preventDefault(); // Mencegah reload halaman

        // Mengambil nilai (bisa digunakan untuk API sungguhan nanti)
        const name = document.getElementById('name').value;
        const email = document.getElementById('email').value;
        
        // Menampilkan Toast sukses
        showToast(`Terima kasih ${name}, pesan Anda telah terkirim!`);
        
        // Reset form
        contactForm.reset();
    });

    // 4. Menu Mobile Toggle (Sederhana untuk demo)
    const mobileBtn = document.getElementById('mobile-menu-btn');
    const navMenu = document.querySelector('nav');
    
    mobileBtn.addEventListener('click', () => {
        navMenu.classList.toggle('hidden');
        navMenu.classList.toggle('flex');
        navMenu.classList.toggle('flex-col');
        navMenu.classList.toggle('absolute');
        navMenu.classList.toggle('top-16');
        navMenu.classList.toggle('left-0');
        navMenu.classList.toggle('w-full');
        navMenu.classList.toggle('bg-black');
        navMenu.classList.toggle('p-6');
        navMenu.classList.toggle('gap-4');
    });
});

// Fungsi Toast Notification (Sebagai pengganti alert yang kaku)
function showToast(message) {
    const toast = document.getElementById('toast');
    document.getElementById('toast-message').innerText = message;
    
    toast.classList.add('show');
    toast.style.bottom = '30px'; // Posisi muncul

    // Hilangkan setelah 3 detik
    setTimeout(() => {
        toast.classList.remove('show');
        toast.style.bottom = '-50px';
    }, 3000);
}

// Fungsi Download CV (Simulasi)
function downloadCV() {
    showToast("Memulai unduhan CV (File PDF Dummy)...");
    
    // Logika asli biasanya: 
    // const link = document.createElement('a');
    // link.href = 'path/to/your/cv.pdf';
    // link.download = 'CV_NamaAnda.pdf';
    // link.click();
}