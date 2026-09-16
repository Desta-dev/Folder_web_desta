<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login | Kelola Portofolio</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="admin.css">
</head>
<body class="min-h-screen flex items-center justify-center p-6 bg-gray-900">

    <div class="w-full max-w-md glass-card p-8 rounded-2xl shadow-2xl relative overflow-hidden">
        <div class="absolute top-0 right-0 w-24 h-24 bg-neonPurple/20 blur-[40px] rounded-full"></div>
        
        <div class="text-center mb-8">
            <h1 class="text-2xl font-bold text-white mb-2">Admin <span class="text-[#00f3ff]" style="text-shadow: 0 0 10px #00f3ff;">Login</span></h1>
            <p class="text-gray-400 text-sm">Masukkan sandi untuk mengakses panel kontrol.</p>
        </div>

        <!-- Form ini sekarang BENAR-BENAR mengirim data ke login.php -->
        <form action="login.php" method="POST">
            <div class="mb-4">
                <label class="block text-sm text-gray-400 mb-2">Username</label>
                <input type="text" name="username" required placeholder="admin" 
                       class="w-full bg-black/50 border border-gray-700 rounded-lg px-4 py-3 text-white focus:outline-none focus:border-[#00f3ff] transition-colors">
            </div>
            <div class="mb-6">
                <label class="block text-sm text-gray-400 mb-2">Password</label>
                <input type="password" name="password" required placeholder="••••••••" 
                       class="w-full bg-black/50 border border-gray-700 rounded-lg px-4 py-3 text-white focus:outline-none focus:border-[#b026ff] transition-colors">
            </div>
            <button type="submit" class="w-full bg-blue-600 hover:bg-blue-500 py-3 rounded-lg flex justify-center items-center gap-2 text-white font-bold">
                <i class="fas fa-sign-in-alt"></i> Masuk Dashboard
            </button>
        </form>
        
        <div class="mt-6 text-center">
            <a href="index.html" class="text-xs text-gray-500 hover:text-gray-300 transition-colors">
                <i class="fas fa-arrow-left mr-1"></i> Kembali ke Website Utama
            </a>
        </div>
    </div>

</body>
</html>