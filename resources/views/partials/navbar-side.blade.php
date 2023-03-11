<aside id="left-panel" class="left-panel">
    <nav class="navbar navbar-expand-sm navbar-default">
        <div id="main-menu" class="main-menu collapse navbar-collapse">
            <ul id="menu-items" class="nav nav-pills flex-column mb-auto mt-3 ms-3">
                <li class="mb-1 @if (request()->is('/')) active @endif ">
                    <a href="/"
                        class="nav-link link-dark dashboard @if (request()->is('/')) text-success @endif">
                        <i class="bi bi-house-door-fill"></i>
                        Dashboard
                    </a>
                </li>
                <li class="mb-1 p-1  @if (request()->is('anggaran') || request()->is('realisasi')) active @endif">
                    <button
                        class="btn btn-toggle d-inline-flex align-items-center rounded border-0 collapsed fw-normal @if (request()->is('anggaran') || request()->is('realisasi')) text-success @else text-dark @endif"
                        data-bs-toggle="collapse" data-bs-target="#laporan" aria-expanded="false">
                        <i class="bi bi-table pe-1"></i>Laporan</button>
                    <div class="collapse ps-2" id="laporan">
                        <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small mt-1">
                            <li class="mb-1"><a href="{{ route('anggaran.index') }}"
                                    class="link-dark d-inline-flex text-decoration-none rounded">Anggaran</a>
                            </li>
                            <li class="mb-1"><a href="{{ route('realisasi.index') }}"
                                    class="link-dark d-inline-flex text-decoration-none rounded">Realisasi</a></li>
                        </ul>
                    </div>
                </li>
                <li class="mb-1 p-1 @if (request()->is('anggaran/create') || request()->is('realisasi/create')) active @endif ">
                    <button
                        class="btn btn-toggle d-inline-flex align-items-center rounded border-0 collapsed fw-normal @if (request()->is('anggaran/create') || request()->is('realisasi/create')) text-success @else text-dark @endif"
                        data-bs-toggle="collapse" data-bs-target="#input-data" aria-expanded="false">
                        <i class="bi bi-pencil-fill pe-1"></i>Input Data</button>
                    <div class="collapse ps-2" id="input-data">
                        <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small mt-1">
                            @if (Auth::user()->role == 'admin')
                                <li class="mb-1"><a href="{{ route('anggaran.create') }}"
                                        class="link-dark d-inline-flex text-decoration-none rounded">Anggaran</a>
                                </li>
                            @endif
                            <li class="mb-1"><a href="{{ route('realisasi.create') }}"
                                    class="link-dark d-inline-flex text-decoration-none rounded">Realisasi</a></li>
                        </ul>
                    </div>
                </li>
                <li class="mb-1 p-1 @if (request()->is('file') || request()->is('file/*')) active @endif ">
                    <button
                        class="btn btn-toggle d-inline-flex align-items-center rounded border-0 collapsed fw-normal @if (request()->is('file/*')) text-success @else text-dark @endif"
                        data-bs-toggle="collapse" data-bs-target="#file" aria-expanded="false">
                        <i class="bi bi-folder-fill pe-1"></i>Berkas</button>
                    <div class="collapse ps-2" id="file">
                        <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small mt-1">
                            <li class="mb-1"><a href="{{ route('file.create') }}"
                                    class="link-dark d-inline-flex text-decoration-none rounded">Input File</a>
                            </li>
                            <li class="mb-1"><a href="{{ route('file.index') }}"
                                    class="link-dark d-inline-flex text-decoration-none rounded">Laporan</a></li>
                        </ul>
                    </div>
                </li>
                {{-- <li class="mb-1 @if (request()->is('/berkas')) active @endif ">
                    <a href="/berkas"
                        class="nav-link link-dark dashboard @if (request()->is('/berkas')) text-success @endif">
                        <i class="bi bi-folder-fill"></i>
                        Berkas
                    </a>
                </li> --}}
            </ul>
        </div>
        <!-- /.navbar-collapse -->
    </nav>
</aside>
