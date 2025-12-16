<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Visualisasi Stack</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

    <style>
        body {
            font-family: 'Segoe UI', sans-serif;
            background: #f4f6f9;
            height: 100vh;
            margin: 0;
        }

        .container-main {
            display: flex;
            height: 100%;
        }

        /* Sidebar */
        .sidebar {
            width: 230px;
            background: #ffffff;
            padding: 20px;
            box-shadow: 2px 0 10px rgba(0, 0, 0, .1);
        }

        .sidebar h4 {
            text-align: center;
            margin-bottom: 20px;
        }

        .sidebar input,
        .sidebar button {
            width: 100%;
            margin-bottom: 10px;
        }

        /* Stack Area */
        .stack-area {
            flex: 1;
            display: flex;
            justify-content: center;
            align-items: center;
            position: relative;
        }

        .stack-wrapper {
            display: flex;
            flex-direction: column-reverse;
            align-items: center;
        }

        .stack-box {
            width: 120px;
            height: 45px;
            background: #3498db;
            color: white;
            margin: 6px 0;
            border-radius: 8px;
            display: flex;
            justify-content: center;
            align-items: center;
            font-weight: bold;
            transition: .4s;
        }

        .top {
            background: #e74c3c !important;
            transform: translateY(-10px);
        }

        .top-label {
            position: absolute;
            top: 20px;
            font-weight: bold;
            color: #e74c3c;
        }

        .info {
            position: absolute;
            bottom: 20px;
            font-weight: bold;
            color: #333;
        }
    </style>
</head>

<body>

    <div class="container-main">

        <!-- Sidebar -->
        <div class="sidebar">
            <h4><i class="bi bi-stack"></i> Stack</h4>

            <input type="number" id="pushValue" placeholder="Masukkan nilai">

            <button class="btn btn-primary" onclick="pushStack()">
                <i class="bi bi-plus-circle"></i> Push
            </button>

            <button class="btn btn-danger" onclick="popStack()">
                <i class="bi bi-dash-circle"></i> Pop
            </button>

            <button class="btn btn-secondary" onclick="peekStack()">
                <i class="bi bi-eye"></i> Peek
            </button>

            <button class="btn btn-info text-white" onclick="stackSize()">
                <i class="bi bi-list-ol"></i> Size
            </button>

            <button class="btn btn-warning text-white" onclick="resetStack()">
                <i class="bi bi-arrow-counterclockwise"></i> Reset
            </button>
        </div>

        <!-- Stack Visualization -->
        <div class="stack-area">
            <div class="top-label">TOP</div>
            <div class="stack-wrapper" id="stackContainer"></div>
            <div class="info" id="infoText"></div>
        </div>

    </div>

    <script>
        let stack = [];
        const container = document.getElementById("stackContainer");
        const info = document.getElementById("infoText");

        function renderStack() {
            container.innerHTML = '';
            stack.forEach((val, i) => {
                const div = document.createElement("div");
                div.className = "stack-box";
                if (i === stack.length - 1) div.classList.add("top");
                div.textContent = val;
                container.appendChild(div);
            });
        }

        function pushStack() {
            const val = parseInt(document.getElementById("pushValue").value);
            if (isNaN(val)) return;
            stack.push(val);
            info.textContent = `Push ${val}`;
            renderStack();
        }

        function popStack() {
            if (stack.length === 0) {
                info.textContent = "Stack kosong";
                return;
            }
            const popVal = stack.pop();
            info.textContent = `Pop ${popVal}`;
            renderStack();
        }

        function peekStack() {
            if (stack.length === 0) {
                info.textContent = "Stack kosong";
                return;
            }
            info.textContent = `Peek: ${stack[stack.length - 1]}`;
        }

        function stackSize() {
            info.textContent = `Jumlah elemen: ${stack.length}`;
        }

        function resetStack() {
            stack = [];
            info.textContent = "Stack dikosongkan";
            renderStack();
        }

        renderStack();
    </script>

</body>

</html>