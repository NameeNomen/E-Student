{{-- resources/views/partials/header-styles.blade.php --}}

<style>
    /* Mengimpor Font Poppins */
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap');
    
    body {
        font-family: 'Poppins', sans-serif;
        background-color: #f8fafc; /* Warna latar belakang sangat terang */
    }
    
    /* Definisi Warna Ungu Khusus untuk Navbar */
    .navbar-purple {
        background-color: #6d28d9; /* Ungu Gelap (Violet/Indigo 700) */
    }
    /* Mengubah warna teks default di navbar menjadi putih */
    .nav-link {
        color: white; 
        font-weight: 500;
    }
    .nav-link:hover {
        color: #d1d5db; /* Abu-abu terang saat hover */
    }
    
    /* --- CSS untuk Transisi Dropdown yang Dikontrol oleh JS --- */
    .dropdown-menu {
        transition: opacity 0.3s ease, transform 0.3s ease; /* Transisi visual yang cepat */
        transform-origin: top;
    }
    .dropdown-hidden {
        opacity: 0;
        transform: scale(0.95);
        pointer-events: none; 
    }
    .dropdown-visible {
        opacity: 1;
        transform: scale(1);
        pointer-events: auto;
    }
    
    /* Style untuk area logo di baris atas agar memiliki background putih */
    .logo-profile-container {
        padding: 1rem 0; /* Memberi padding vertikal */
    }
    .logo-wrapper {
        background-color: white; /* Latar belakang putih */
        border-radius: 0.5rem; /* Sudut melengkung */
        padding: 0.5rem 1rem;
        box-shadow: 0 1px 3px 0 rgba(0, 0, 0, 0.1), 0 1px 2px 0 rgba(0, 0, 0, 0.06);
    }
</style>