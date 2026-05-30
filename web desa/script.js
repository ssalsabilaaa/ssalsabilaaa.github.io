// Dark Mode
const darkModeBtn = document.getElementById("darkModeBtn");

darkModeBtn.addEventListener("click", () => {
    document.body.classList.toggle("dark-mode");
});

// Smooth Scroll
document.querySelectorAll('a[href^="#"]').forEach(anchor => {

    anchor.addEventListener("click", function(e) {

        e.preventDefault();

        document.querySelector(this.getAttribute("href"))
            .scrollIntoView({
                behavior: "smooth"
            });
    });
});

// Animasi Scroll
const sections = document.querySelectorAll("section");

window.addEventListener("scroll", () => {

    sections.forEach(section => {

        const position = section.getBoundingClientRect().top;
        const screenPosition = window.innerHeight / 1.3;

        if(position < screenPosition){
            section.style.opacity = 1;
            section.style.transform = "translateY(0)";
        }
    });
});

// Initial Style
sections.forEach(section => {
    section.style.opacity = 0;
    section.style.transform = "translateY(50px)";
    section.style.transition = "all 0.6s ease";
});

// ================= TAB UMKM =================

const tabButtons = document.querySelectorAll(".tab-btn");
const tabContents = document.querySelectorAll(".tab-content");

tabButtons.forEach(button => {

    button.addEventListener("click", () => {

        // Hapus active semua tombol
        tabButtons.forEach(btn => {
            btn.classList.remove("active");
        });

        // Hapus active semua content
        tabContents.forEach(content => {
            content.classList.remove("active");
        });

        // Tambah active tombol dipilih
        button.classList.add("active");

        // Tampilkan content sesuai tombol
        const target = button.dataset.tab;

        document.getElementById(target)
            .classList.add("active");
    });

});

// ================= PENGADUAN =================

const formPengaduan = document.querySelector(".pengaduan-form");

formPengaduan.addEventListener("submit", (e) => {

    e.preventDefault();

    alert("Pengaduan berhasil dikirim!");

    formPengaduan.reset();

});