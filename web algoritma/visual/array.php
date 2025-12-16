<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Visualisasi Array Interaktif</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

    <style>
        body {
            font-family: 'Segoe UI', sans-serif;
            background: #f4f6f9;
        }

        .container-main {
            display: flex;
            height: 100vh;
        }

        .sidebar {
            width: 240px;
            background: #ffffff;
            padding: 20px;
            box-shadow: 2px 0 8px rgba(0, 0, 0, .1);
        }

        .sidebar button,
        .sidebar input,
        .sidebar select {
            width: 100%;
            margin-bottom: 10px;
        }

        .visual-array {
            flex: 1;
            padding: 30px;
            text-align: center;
        }

        #array-container {
            display: flex;
            justify-content: center;
            gap: 10px;
            margin-top: 25px;
        }

        .box {
            width: 55px;
            height: 55px;
            background: #3498db;
            color: white;
            border-radius: 8px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            font-weight: bold;
            transition: .3s;
        }

        .index {
            font-size: 12px;
            opacity: .8;
        }

        /* Warna visualisasi */
        .mid {
            background: #e74c3c !important;
        }

        .left {
            background: #f1c40f !important;
        }

        .right {
            background: #2ecc71 !important;
        }

        .sorted {
            background: #2ecc71 !important;
        }
    </style>
</head>

<body>

    <div class="container-main">

        <!-- SIDEBAR -->
        <div class="sidebar">
            <h5 class="text-center mb-3">
                <i class="bi bi-kanban"></i> Array Visual
            </h5>

            <input type="number" id="newValue" placeholder="Tambah nilai">
            <button class="btn btn-primary" onclick="addElement()">
                <i class="bi bi-plus-circle"></i> Tambah
            </button>

            <button class="btn btn-danger" onclick="deleteElement()">
                <i class="bi bi-trash"></i> Hapus
            </button>

            <select id="algoType" class="form-select">
                <option value="linear">Linear Search</option>
                <option value="binary">Binary Search</option>
                <option value="bubble">Bubble Sort</option>
            </select>

            <input type="number" id="searchValue" placeholder="Cari nilai">
            <button class="btn btn-success" onclick="runAlgorithm()">
                <i class="bi bi-play-fill"></i> Jalankan
            </button>

            <button class="btn btn-secondary" onclick="resetArray()">
                <i class="bi bi-arrow-counterclockwise"></i> Reset
            </button>

            <div id="result" class="mt-2 fw-bold"></div>
        </div>

        <!-- VISUALISASI ARRAY -->
        <div class="visual-array">
            <h4>Visualisasi Array Interaktif</h4>
            <p class="text-muted">🔴 Mid | 🟡 Left | 🟢 Right / Sorted</p>
            <div id="array-container"></div>
        </div>

    </div>

    <script>
        const initialArray = [10, 20, 30, 40, 50];
        let arr = [...initialArray];

        const container = document.getElementById("array-container");
        const result = document.getElementById("result");

        function renderArray(mid = null, left = null, right = null, sortedIndex = []) {
            container.innerHTML = '';
            arr.forEach((val, i) => {
                const box = document.createElement('div');
                box.className = 'box';

                if (i === mid) box.classList.add('mid');
                else if (i === left) box.classList.add('left');
                else if (i === right || sortedIndex.includes(i)) box.classList.add('right');

                box.innerHTML = `${val}<div class="index">i=${i}</div>`;
                container.appendChild(box);
            });
        }

        function addElement() {
            const val = parseInt(newValue.value);
            if (!isNaN(val)) arr.push(val);
            renderArray();
        }

        function deleteElement() {
            arr.pop();
            renderArray();
        }

        function resetArray() {
            arr = [...initialArray];
            result.textContent = '';
            renderArray();
        }

        async function linearSearch(val) {
            for (let i = 0; i < arr.length; i++) {
                renderArray(i);
                await delay(500);
                if (arr[i] === val) {
                    result.textContent = `Linear Search: nilai ${val} ditemukan di indeks ${i}`;
                    return;
                }
            }
            result.textContent = `Linear Search: nilai ${val} tidak ditemukan`;
            renderArray();
        }

        async function binarySearch(val) {
            arr = [...arr].sort((a, b) => a - b);
            let left = 0;
            let right = arr.length - 1;

            while (left <= right) {
                let mid = Math.floor((left + right) / 2);
                renderArray(mid, left, right);
                await delay(700);

                if (arr[mid] === val) {
                    result.textContent = `Binary Search: nilai ${val} ditemukan di indeks ${mid} (sorted)`;
                    return;
                }

                if (val < arr[mid]) right = mid - 1;
                else left = mid + 1;
            }
            result.textContent = `Binary Search: nilai ${val} tidak ditemukan`;
            renderArray();
        }

        async function bubbleSort() {
            let sorted = [];
            for (let i = 0; i < arr.length; i++) {
                for (let j = 0; j < arr.length - i - 1; j++) {
                    renderArray(null, j, j + 1, sorted);
                    await delay(400);

                    if (arr[j] > arr[j + 1]) {
                        [arr[j], arr[j + 1]] = [arr[j + 1], arr[j]];
                        renderArray(null, j, j + 1, sorted);
                        await delay(400);
                    }
                }
                sorted.push(arr.length - i - 1);
            }
            result.textContent = "Bubble Sort selesai";
            renderArray(null, null, null, sorted);
        }

        async function runAlgorithm() {
            const algo = algoType.value;
            const val = parseInt(searchValue.value);
            result.textContent = '';

            setDisabled(true);

            if (algo === 'linear') await linearSearch(val);
            else if (algo === 'binary') await binarySearch(val);
            else await bubbleSort();

            setDisabled(false);
        }

        function setDisabled(state) {
            document.querySelectorAll("button, input, select")
                .forEach(el => el.disabled = state);
        }

        function delay(ms) {
            return new Promise(r => setTimeout(r, ms));
        }

        renderArray();
    </script>

</body>

</html>