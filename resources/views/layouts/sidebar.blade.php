@php
    $menus = [
        [
            'title' => 'Pelajaran',
            'url' => 'pelajaran',
            'children' => [
                [
                    'title' => 'List pelajaran',
                    'url' => 'pelajaran',
                ],
                [
                    'title' => 'Tambah Pelajaran',
                    'url' => 'pelajaran/create',
                ]
            ],
        ],
        [
            'title' => 'Kelas',
            'url' => 'kelas',
            'children' => [
                [
                    'title' => 'List Kelas',
                    'url' => 'kelas',
                ],
                [
                    'title' => 'Tambah Kelas',
                    'url' => 'kelas/create',
                ]
            ],
        ],
        [
            'title' => 'Siswa',
            'url' => 'siswa',
            'children' => [
                [
                    'title' => 'List Siswa',
                    'url' => 'siswa',
                ],
                [
                    'title' => 'Tambah Siswa',
                    'url' => 'siswa/create',
                ]
            ],
        ],
        [
            'title' => 'User',
            'url' => 'users',
            'children' => [
                [
                    'title' => 'List User',
                    'url' => 'users',
                ],
                [
                    'title' => 'Tambah User',
                    'url' => 'users/create',
                ]
            ],
        ],
        [
            'title' => 'Absensi',
            'url' => 'absensi',
            'children' => [
                [
                    'title' => 'List Absensi',
                    'url' => 'absensi',
                ],
                [
                    'title' => 'Tambah Absensi',
                    'url' => 'absensi/create',
                ]
            ],
        ],
    ];
@endphp

<!-- Sidebar -->
<nav class="bg-dark text-white p-3" style="width: 250px; height: 100vh;">
    <h3>Sekolah</h3>
    <ul class="nav flex-column mt-4">
        @foreach ($menus as $index => $menu)
            <li class="nav-item">
                <a class="nav-link text-white {{ request()->is($menu['url'].'*') ? 'active' : '' }}" data-bs-toggle="collapse" href="@isset($menu['children']) #{{ $index }} @else {{ '/'.$menu[url] }} @endisset" role="button" aria-expanded="false" aria-controls="{{ $index }}">
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
