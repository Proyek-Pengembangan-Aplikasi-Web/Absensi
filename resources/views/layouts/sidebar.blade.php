<!-- Sidebar -->
<nav class="bg-dark text-white p-3" style="width: 250px; height: 100vh;">
    <ul class="nav flex-column mt-4">
        @if (Auth::user()->role == 'admin')
            @php
                $menus = [
                    [
                        'title' => 'Pelajaran',
                        'url' => 'admin/pelajaran',
                        'children' => [
                            [
                                'title' => 'List pelajaran',
                                'url' => 'admin/pelajaran',
                            ],
                            [
                                'title' => 'Tambah Pelajaran',
                                'url' => 'admin/pelajaran/create',
                            ]
                        ],
                    ],
                    [
                        'title' => 'Jadwalkan Guru',
                        'url' => 'admin/jadwal',
                    ],
                    [
                        'title' => 'Kelas',
                        'url' => 'admin/kelas',
                        'children' => [
                            [
                                'title' => 'List Kelas',
                                'url' => 'admin/kelas',
                            ],
                            [
                                'title' => 'Tambah Kelas',
                                'url' => 'admin/kelas/create',
                            ]
                        ],
                    ],
                    [
                        'title' => 'Siswa',
                        'url' => 'admin/siswa',
                        'children' => [
                            [
                                'title' => 'List Siswa',
                                'url' => 'admin/siswa',
                            ],
                            [
                                'title' => 'Tambah Siswa',
                                'url' => 'admin/siswa/create',
                            ]
                        ],
                    ],
                    [
                        'title' => 'User',
                        'url' => 'admin/users',
                        'children' => [
                            [
                                'title' => 'List User',
                                'url' => 'admin/users',
                            ],
                            [
                                'title' => 'Tambah User',
                                'url' => 'admin/users/create',
                            ]
                        ],
                    ],
                    [
                        'title' => 'Absensi',
                        'url' => 'admin/absensi',
                    ],
                ];
            @endphp

            @foreach ($menus as $index => $menu)
                <li class="nav-item">
                    <a class="nav-link text-white {{ request()->is($menu['url'].'*') ? 'active' : '' }}" @isset($menu['children']) data-bs-toggle="collapse" @endisset href="@isset($menu['children']) #{{ $index }} @else {{ '/'.$menu['url'] }} @endisset" role="button" aria-expanded="false" aria-controls="{{ $index }}">
                        {{ $menu['title'] }}
                    </a>
                    @isset($menu['children'])
                        <ul class="nav flex-column collapse submenu" id="{{ $index }}">
                            @foreach ($menu['children'] as $child)
                                <li class="nav-item">
                                    <a class="nav-link text-white" href="{{ '/'.$child['url'] }}">{{ $child['title'] }}</a>
                                </li>
                            @endforeach
                        </ul>
                    @endisset
                </li>
            @endforeach
        @else
            @php
                $jadwal = App\Models\Jadwal::where('id_user', Auth::user()->id)->whereDate('date', Carbon\Carbon::now())->get();
            @endphp

            <li class="nav-item">
                <a class="nav-link text-white {{ request()->is('dashboard') ? 'active' : '' }}" href="{{ route('dashboard') }}">Dashboard</a>
            </li>

            <li class="nav-item">
                <a class="nav-link text-white {{ request()->is('guru/jadwal*') ? 'active' : '' }}" href="#index" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="index">
                    Jadwal Saya
                </a>
                <ul class="nav flex-column collapse submenu" id="index">
                    @foreach ($jadwal as $pljrn)
                        <li class="nav-item">
                            <a class="nav-link text-white" href="{{ route('guru.jadwal.show', $pljrn->id) }}">{{ $pljrn->pelajaran->name }}</a>
                        </li>
                    @endforeach
                </ul>
            </li>
        @endif
        <li class="nav-item">
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button class="nav-link text-danger">
                    Logout
                </button>
            </form>
        </li>
    </ul>
</nav>

