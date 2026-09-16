<?php
session_start();
include 'koneksi.php';

// Pengecekan tiket login
if (!isset($_SESSION['username'])) {
    echo "<script>alert('Anda harus login terlebih dahulu!'); window.location='form-login.php';</script>";
    exit();
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel | Kelola Portofolio</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="admin.css">
</head>
<body class="min-h-screen p-6 bg-[#0B0F19]">

    <div class="w-full max-w-6xl mx-auto py-10">
        <!-- Header Admin -->
        <header class="flex justify-between items-center mb-10 border-b border-gray-800 pb-5">
            <h1 class="text-3xl font-bold text-white">
                Panel <span class="text-[#00f3ff]" style="text-shadow: 0 0 10px #00f3ff;">Admin</span>
            </h1>
            <div class="flex items-center gap-4">
                <a href="index.html" class="px-4 py-2 bg-gray-800 hover:bg-gray-700 rounded-lg text-sm transition-colors text-white">
                    <i class="fas fa-eye mr-2"></i> Lihat Website
                </a>
                <a href="logout.php" class="px-4 py-2 bg-red-900/50 hover:bg-red-900 text-red-300 rounded-lg text-sm transition-colors border border-red-700 block">
                    <i class="fas fa-sign-out-alt mr-2"></i> Logout
                </a>
            </div>
        </header>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            
            <!-- FORM TAMBAH PROJECT -->
            <div class="glass-card p-6 rounded-2xl h-fit border border-gray-800 bg-[#111827]">
                <h2 class="text-xl font-bold text-white mb-6 border-l-4 border-[#b026ff] pl-3">Tambah Project Baru</h2>
                
                <form id="formTambahProject" action="tambah_project.php" method="POST">
                    <div class="mb-4">
                        <label class="block text-sm text-gray-400 mb-2">Judul Project</label>
                        <input type="text" name="judul" id="judul" required placeholder="Contoh: Aplikasi Kasir" 
                               class="w-full bg-black/50 border border-gray-700 rounded-lg px-4 py-2 text-white focus:outline-none focus:border-[#00f3ff]">
                    </div>

                    <div class="mb-4">
                        <label class="block text-sm text-gray-400 mb-2">Kategori (Skill)</label>
                        <input type="text" name="kategori" id="kategori" required placeholder="Contoh: React, Tailwind" 
                               class="w-full bg-black/50 border border-gray-700 rounded-lg px-4 py-2 text-white focus:outline-none focus:border-[#00f3ff]">
                    </div>

                    <div class="mb-6">
                        <label class="block text-sm text-gray-400 mb-2">Deskripsi Singkat</label>
                        <textarea name="deskripsi" id="deskripsi" rows="3" required placeholder="Deskripsi project..."
                                  class="w-full bg-black/50 border border-gray-700 rounded-lg px-4 py-2 text-white focus:outline-none focus:border-[#00f3ff] resize-none"></textarea>
                    </div>

                    <button type="submit" class="w-full bg-cyan-500 hover:bg-cyan-400 text-black font-bold py-3 rounded-lg flex justify-center items-center gap-2 transition-colors">
                        <i class="fas fa-plus"></i> Simpan Project
                    </button>
                </form>
            </div>

            <!-- DAFTAR PROJECT (TABEL DINAMIS) -->
            <div class="lg:col-span-2 glass-card p-6 rounded-2xl border border-gray-800 bg-[#111827]">
                <h2 class="text-xl font-bold text-white mb-6 border-l-4 border-[#00f3ff] pl-3">Daftar Project Saat Ini</h2>
                
                <div class="overflow-x-auto">
                    <table class="w-full text-left border-collapse">
                        <thead>
                            <tr class="bg-black/40 text-gray-400 text-sm border-b border-gray-800">
                                <th class="p-4 font-medium">Nama Project</th>
                                <th class="p-4 font-medium">Kategori</th>
                                <th class="p-4 font-medium text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody id="tabelProject">
                            <?php
                            $query_projects = mysqli_query($conn, "SELECT * FROM projects ORDER BY ID DESC");
                            
                            if (mysqli_num_rows($query_projects) > 0) {
                                while ($p = mysqli_fetch_assoc($query_projects)) {
                                    ?>
                                    <tr class="border-b border-gray-800/50 hover:bg-white/[0.02]">
                                        <td class="p-4 font-semibold text-white"><?= htmlspecialchars($p['Judul']); ?></td>
                                        <td class="p-4 text-sm text-gray-400"><?= htmlspecialchars($p['Kategori']); ?></td>
                                        <td class="p-4 flex justify-center gap-3">
                                            <button class="text-blue-400 hover:text-blue-300"><i class="fas fa-edit"></i></button>
                                            <button class="text-red-500 hover:text-red-400"><i class="fas fa-trash"></i></button>
                                        </td>
                                    </tr>
                                    <?php
                                }
                            } else {
                                echo "<tr><td colspan='3' class='p-4 text-center text-gray-500'>Belum ada project yang ditambahkan.</td></tr>";
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>

</body>
</html>