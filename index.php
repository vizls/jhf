<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Вкладки с запоминанием</title>
    <style>
        .tabs {
            display: flex;
            border-bottom: 1px solid #ccc;
        }
        .tab {
            padding: 10px 20px;
            cursor: pointer;
        }
        .tab.active {
            background-color: #ddd;
            border: 1px solid #ccc;
            border-bottom: none;
        }
        .content {
            display: none;
            padding: 20px;
        }
        .content.active {
            display: block;
        }
    </style>
</head>
<body>
    <?php
    // Читаем сохранённую вкладку из Cookies, если она есть
    $activeTab = isset($_COOKIE['activeTab']) ? $_COOKIE['activeTab'] : 'tab1';
    ?>

    <div class="tabs">
        <div class="tab <?php echo $activeTab === 'tab1' ? 'active' : ''; ?>" data-tab="tab1">Вкладка 1</div>
        <div class="tab <?php echo $activeTab === 'tab2' ? 'active' : ''; ?>" data-tab="tab2">Вкладка 2</div>
        <div class="tab <?php echo $activeTab === 'tab3' ? 'active' : ''; ?>" data-tab="tab3">Вкладка 3</div>
    </div>

    <div class="content <?php echo $activeTab === 'tab1' ? 'active' : ''; ?>" id="tab1">Содержимое вкладки 1</div>
    <div class="content <?php echo $activeTab === 'tab2' ? 'active' : ''; ?>" id="tab2">Содержимое вкладки 2</div>
    <div class="content <?php echo $activeTab === 'tab3' ? 'active' : ''; ?>" id="tab3">Содержимое вкладки 3</div>

    <script>
        const tabs = document.querySelectorAll('.tab');
        const contents = document.querySelectorAll('.content');

        tabs.forEach(tab => {
            tab.addEventListener('click', () => {
                const selectedTab = tab.getAttribute('data-tab');

                // Обновляем активный класс
                tabs.forEach(t => t.classList.remove('active'));
                tab.classList.add('active');

                contents.forEach(content => content.classList.remove('active'));
                document.getElementById(selectedTab).classList.add('active');

                // Сохраняем выбранную вкладку в Cookies
                document.cookie = `activeTab=${selectedTab}; path=/;`;
            });
        });
    </script>
</body>
</html>
