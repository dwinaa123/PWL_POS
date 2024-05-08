<?php
namespace App\Http\Middleware;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class Cek_Login
{
    /**
     * Menangani permintaan yang masuk.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Memeriksa apakah pengguna sudah login
        if (!Auth::check()) {
            // Jika belum, arahkan ke halaman login
            return redirect('login');
        }

        // Mengambil data pengguna yang sudah login
        $user = Auth::user();

        // Memeriksa apakah pengguna memiliki level ID yang sesuai
        // Asumsi bahwa `$roles` adalah parameter yang diberikan ke middleware
        $roles = $request->route()->parameter('roles'); // Anda mungkin perlu menyesuaikan cara parameter roles diteruskan

        if ($user->level_id === $roles) {
            // Jika pengguna memiliki level yang sesuai, lanjutkan permintaan
            return $next($request);
        }

        // Jika pengguna tidak memiliki level yang sesuai, arahkan ke halaman login dengan pesan error
        return redirect('login')->with('error', 'Anda tidak memiliki akses ke sumber daya ini.');
    }
}
