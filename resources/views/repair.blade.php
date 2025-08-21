<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Repair</title>

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Material Design Icons (MDI) -->
    <link href="https://cdn.materialdesignicons.com/5.4.55/css/materialdesignicons.min.css" rel="stylesheet">

    {{-- font font-family --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;700&display=swap" rel="stylesheet">

    <style>
        body {
            background-color: #f8f9fa;
            font-family: 'Inter', sans-serif;
        }
        .card {
            border-radius: 1rem;
            border: none;
        }
        .form-label i {
            /* color: #0d6efd; */
            color: #494d5260;
        }
        .navbar-brand {
            font-weight: bold;
            font-size: 1.25rem;
        }
        .btn-primary {
            font-weight: 500;
            font-size: 1.05rem;
        }
    </style>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm">
    <div class="container-fluid">
        <a class="navbar-brand fw-bold" href="#">
            <i class="mdi mdi-wrench-outline" style="color: #838382;"></i>
            <span style="color: #838382;">MaintenanceRepairSystem</span>
        </a>
        
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse"
                aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end" id="navbarCollapse">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link d-flex align-items-center text-danger" href="/logout" title="Logout">
                        <span class="mdi mdi-logout mdi-24px"></span>
                        <span class="ms-1 d-none d-lg-inline">Logout</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-lg-6 col-md-8">
            <div class="card shadow-lg">
                <div class="card-header bg-primary text-white text-center py-3 rounded-top">
                    <h5 class="mb-0"><i class="mdi mdi-format-list-bulleted"></i> ฟอร์มเลือกข้อมูลแจ้งซ่อม</h5>
                </div>
                <div class="card-body">
                    <form action="/repair/repair2" method="GET" onsubmit="return validateForm();">
                        @csrf

                        <!-- เลือกสาขา -->
                        <div class="mb-3">
                            <label for="branch" class="form-label fw-bold">
                                <i class="mdi mdi-office-building-marker-outline"></i> กรุณาเลือกสาขา
                            </label>
                            <select name="branch" id="branch" class="form-select" required>
                                <option value="">-- เลือกสาขา --</option>
                                @foreach ($branch as $bb)
                                    <option value="{{ $bb->Location }}"
                                        {{-- <option value="{{ $bb->MBranchInfo_Code }}" --}}
                                        @if (session('MBranchInfo_Code') == $bb->MBranchInfo_Code) selected @endif>
                                        {{ $bb->Location }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <!-- เลือก Zone -->
                        <div class="mb-3">
                            <label for="zone" class="form-label fw-bold">
                                <i class="mdi mdi-map-marker-outline"></i> กรุณาเลือก Zone
                            </label>
                            <select name="zone" id="zone" class="form-select" required>
                                <option value="">-- เลือก Zone --</option>
                                @foreach ($manegers as $mn)
                                    <option value="{{ $mn->StaffName }}">{{ $mn->StaffName }}</option>
                                @endforeach
                            </select>
                        </div>

                        <!-- เลือกหมวดหมู่ -->
                        <div class="mb-4">
                            <label for="category" class="form-label fw-bold">
                                <i class="mdi mdi-tools"></i> เลือกหมวดหมู่แจ้งซ่อม
                            </label>
                            <select name="category" id="category" class="form-select" required>
                                <option value="">-- เลือกหมวดหมู่ --</option>
                                @foreach ($equipmenttype as $eqm)
                                    <option value="{{ $eqm->TypeId }}">{{ $eqm->TypeName }}</option>
                                @endforeach
                            </select>
                        </div>

                        <!-- ปุ่มไปต่อ -->
                        <div class="d-grid">
                            <button type="submit" class="btn btn-primary btn-lg">
                                <i class="mdi mdi-arrow-right-bold-circle-outline"></i> ไปต่อ
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap 5 JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script>
    function validateForm() {
        const branch = document.getElementById('branch').value;
        const zone = document.getElementById('zone').value;
        const category = document.getElementById('category').value;

        if (!branch || !zone || !category) {
            alert('กรุณาเลือกข้อมูลให้ครบทุกช่องก่อนกดไปต่อ');
            return false;
        }
        return true;
    }
</script>

</body>
</html>
