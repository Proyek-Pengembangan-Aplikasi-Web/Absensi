### Laporan Proyek Pengembangan Aplikasi Web Absensi Siswa

**Penyusun:**  
- 225410095 / Muhammad Khoirul Anam Ihsan  
- 225410089 / Arnoldus Paulus Sewa  
- 225410081 / Alfian Desna Saputra  

**Program Studi Informatika Klas 1**  
Fakultas Teknologi Informasi  
Universitas Teknologi Digital Indonesia (UTDI)  
2024  

---

### 1. Pendahuluan

**Latar Belakang:**  
Kemajuan teknologi informasi dan komunikasi turut mendorong dunia pendidikan untuk mengadopsi inovasi yang meningkatkan efisiensi pengelolaan administrasi, termasuk sistem absensi siswa. Proyek ini bertujuan mengembangkan aplikasi absensi berbasis web untuk mengurangi pekerjaan manual, menghemat waktu, dan menyusun data absensi secara rapi.

**Tujuan:**  
Proyek ini bertujuan untuk:
- Mempermudah pencatatan kehadiran siswa secara otomatis.
- Menyediakan akses real-time bagi guru, wali kelas, dan pihak sekolah untuk memantau kehadiran siswa.

**Batasan Masalah:**  
1. **Lingkup Pengguna**: Aplikasi ini digunakan oleh admin sekolah, guru, dan pihak sekolah lainnya.
2. **Fitur-Fitur yang Dikembangkan:**
   - Login pengguna dengan akun terproteksi.
   - Laporan kehadiran real-time.
   - Pengelolaan jadwal guru oleh admin.
   - CRUD (Create, Read, Update, Delete) data pelajaran, kelas, siswa, dan pengguna oleh admin.
   - Absensi siswa oleh guru dengan status hadir/tidak hadir beserta alasannya.
3. **Fitur yang Tidak Dikembangkan:**
   - Penilaian akademik siswa.
   - Fitur biometrik atau pengelolaan pembayaran.
   - Akun orang tua siswa.
4. **Platform Pengembangan:**  
   - Aplikasi berbasis web tanpa pengembangan aplikasi mobile native.

---

### 2. Perancangan Sistem

**Rancangan Database:**  
Database aplikasi bernama *absensi*, terdiri dari tabel-tabel berikut:

1. **Tabel siswa:**
   - **Nama Tabel:** siswa
   - **Kolom:**
     | No | Nama Kolom  | Tipe       | Keterangan         |
     |----|-------------|------------|--------------------|
     | 1  | id_siswa    | int        | Auto Increment     |
     | 2  | nama_siswa | varchar    | Nama siswa         |
     | 3  | nis         | varchar    | Nomor Induk Siswa |
     | 4  | kelas       | varchar    | Kelas siswa        |

2. **Tabel absensi:**
   - **Nama Tabel:** absensi
   - **Kolom:**
     | No | Nama Kolom  | Tipe            | Keterangan                      |
     |----|-------------|-----------------|----------------------------------|
     | 1  | id_absensi  | int             | Auto Increment                  |
     | 2  | id_siswa    | int             | Foreign key referensi tabel siswa |
     | 3  | tanggal     | date            | Tanggal absensi                 |
     | 4  | status      | enum(hadir, tidak hadir) | Status kehadiran siswa |

**Relasi Tabel:**  
Tabel *siswa* berelasi dengan tabel *absensi* melalui *id_siswa* sebagai kunci asing (*foreign key*).

**Data Flow Diagram (DFD):**  
1. **Level 0:**
   - Admin mengelola data pengguna, pelajaran, kelas, jadwal, dan siswa.
   - Guru mengelola absensi siswa.
   - Output berupa laporan absensi siswa.
2. **Level 1:**
   - Menjelaskan proses lebih rinci dalam pengelolaan absensi dan data terkait.

---

### 3. Teknologi / Framework

**Laravel:**
- **Keunggulan:**
  - Berbasis Model-View-Controller (MVC) yang terstruktur.
  - Memiliki fitur keamanan built-in seperti proteksi CSRF, hashing password, dan enkripsi data.
  - Mendukung pengembangan aplikasi yang efisien dan terorganisir.

---

### 4. Implementasi

#### **Implementasi Fitur Utama:**

1. **Halaman Login Admin:**
   ```php
   public function showLoginForm() {
       return view('auth.login');
   }

   public function login(Request $request) {
       $request->validate([
           'username' => 'nullable',
           'email' => 'nullable|email',
           'password' => 'required',
       ]);

       if (Auth::attempt($request->only(['email', 'password']))) {
           $request->session()->regenerate();
           return redirect()->intended('/');
       }

       return back()->withErrors([
           'email' => 'The provided credentials do not match our records.',
       ]);
   }
   ```

2. **Halaman Dashboard Admin:**
   ```php
   public function index() {
       $data['siswa'] = Siswa::count();
       $data['kelas'] = Kelas::count();
       $data['guru'] = User::where('role', 'guru')->count();
       return view('dashboard', $data);
   }
   ```

3. **Halaman Pengelolaan Data:**
   - **CRUD Pelajaran, Kelas, Siswa, dan Jadwal Guru:**
     Menggunakan struktur fungsi seperti *index*, *create*, *store*, *edit*, *update*, dan *destroy* untuk masing-masing entitas.

4. **Halaman Absensi:**
   ```php
   public function index() {
       $data['jadwal'] = Jadwal::get();
       return view('admin.absensi.index', $data);
   }
   ```

5. **Halaman Profil Pengguna:**
   ```php
   public function update(Request $request) {
       $validate = $request->validate([
           'username' => 'required',
           'name' => 'required',
           'email' => 'required|email',
           'password' => 'nullable',
       ]);

       if ($request->password) {
           $validate['password'] = Hash::make($request->password);
       }
       User::whereId(Auth::user()->id)->update($validate);
       return redirect()->back();
   }
   ```

---

### 5. Penutup
Proyek pengembangan aplikasi web absensi siswa berbasis Laravel ini diharapkan dapat membantu sekolah dalam mengelola data absensi siswa secara efektif dan efisien. Dengan pengelolaan yang terstruktur dan fitur keamanan yang memadai, aplikasi ini memberikan solusi modern untuk sistem absensi manual yang seringkali kurang akurat dan memakan waktu.

