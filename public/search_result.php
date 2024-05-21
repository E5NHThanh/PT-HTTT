<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kết quả tìm kiếm</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- <style>
        .mathang-item {
            display: flex;
            align-items: center;
            padding: 10px;
            border-bottom: 1px solid #ddd;
        }

        .mathang-item:last-child {
            border-bottom: none;
        }

        .mathang-item img {
            border-radius: 5px;
            object-fit: cover;
            margin-right: 15px;
        }

        .mathang-item h5 {
            margin: 0;
            font-size: 1rem;
        }

        .mathang-item p {
            margin: 0.2rem 0;
        }

        .no-result-message {
            padding: 10px;
            color: #888;
        }
    </style> -->
</head>

<body>
    <div class="container mt-5">
        <h1 class="mb-4">Kết quả tìm kiếm</h1>
        <div id="search-suggestions">
            <?php
            require("../model/mathang.php");
            $s = new MATHANG();
            if (isset($_GET["keyword"])) {
                $keyword = $_GET["keyword"];
                $result = $s->timkiemmathang($keyword);

                if (!empty($result)) {
                    foreach ($result as $item) {
                        echo "<div class='mathang-item'>";
                        echo "<img src='../images/product/{$item['hinhanh']}' alt='{$item['tenmathang']}' width='80' height='80'>";
                        echo "<div>";
                        echo "<h5><a href='index.php?action=detail&id={$item['id']}'>{$item['tenmathang']}</a></h5>";
                        echo "<p class='text-success'>Giá: " . number_format($item['giaban'], 0, ',', '.') . " VND</p>";
                        echo "</div>";
                        echo "</div>";
                    }
                } else {
                    echo "<p class='no-result-message'>Không tìm thấy kết quả cho '$keyword'</p>";
                }
            }
            ?>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
