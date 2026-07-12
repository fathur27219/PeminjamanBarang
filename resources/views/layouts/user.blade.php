<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>

    <script>
        try {
            const collapsed = localStorage.getItem('sidebarCollapsed');
            document.documentElement.classList.add(collapsed === 'false' ? 'sidebar-expanded' : 'sidebar-collapsed');
        } catch (e) {
            // ignore
        }
    </script>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
    html.sidebar-collapsed .sidebar {
        width: 80px !important;
    }

    html.sidebar-expanded .sidebar {
        width: 260px !important;
    }
        body {
            background: #f5f7fb;
        }

        .sidebar {
            min-height: 100vh;
            background: #1e293b;
        }

        .sidebar .nav-link {
            color: #cbd5e1;
            padding: 12px 15px;
            border-radius: 8px;
            margin-bottom: 5px;
        }

        .sidebar .nav-link:hover {
            background: #334155;
            color: #fff;
        }

        .sidebar .active {
            background: #0d6efd;
            color: #fff !important;
        }

        .card-custom {
            border: none;
            border-radius: 15px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, .05);
        }

        .content-box {
            background: #fff;
            border-radius: 15px;
            padding: 20px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, .05);
        }
    </style>

</head>

<body>

    <div class="container-fluid">

        <div class="row align-items-stretch">

            <div class="col-auto p-0 d-flex">
                @include('Sidebar.SidebarUser')
            </div>

            <div class="col p-4">

                <div class="d-flex justify-content-between align-items-center bg-white p-3 rounded shadow-sm">

                    <h4 class="mb-0">
                        @yield('page-title')
                    </h4>

                    <div>
                        👤 {{ Auth::user()->name }}
                    </div>

                </div>

                @yield('content')

            </div>

        </div>

    </div>

</body>

</html>