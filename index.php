<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"/>
    <title>Dashboard</title>
    <link rel="stylesheet" href="style.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"/>
</head>
<body>
    <div class="sidebar">
        <div class="logo"></div>
        <ul class="menu">
            <li class="active">
                <a href="index.php">
                    <span>Dashboard</span>
                </a>
            </li>
            <li>
                <a href="datatable.php">
                    <span>Data Table</span>
                </a>
            </li>
            <li>
                <a href="insertdata.php">
                    <span>Tambah Data</span>
                </a>
            </li>
            <li class="logout">
                <a href="#">
                    <span>Logout</span>
                </a>
            </li>
        </ul>
    </div>

    <div class="main--content">
        <div class="header--wrapper">
            <div class ="header--title">
                <span>Primary</span>
                <h2>Dasboard</h2>
            </div>
            <div class="user--info">
                <div class="search--box">
                    
                    <i class="fas fa-search"></i>
                    <input type="text" placeholder="Search">
                </div>
                <img src="./image/img.jpg" alt=""/>
            </div>            
        </div>

        <div class="card--container">
            <h3 class="main--title">Data Unit</h3>
            <div class="card--wrapper">
                <div class="data--card light-purple">
                    <div class="card--header">
                        <div class="amount">
                            <span class="title">
                               1 BED ROOM 
                            </span>
                            <span class="amount--value">
                                10
                            </span>
                        </div>
                    </div>
                </div>

                <div class="data--card light-purple">
                    <div class="card--header">
                        <div class="amount">
                            <span class="title">
                               2 BED ROOM 
                            </span>
                            <span class="amount--value">
                                10
                            </span>
                        </div>
                    </div>
                </div>

                <div class="data--card light-purple">
                    <div class="card--header">
                        <div class="amount">
                            <span class="title">
                               3 BED ROOM 
                            </span>
                            <span class="amount--value">
                                10
                            </span>
                        </div>
                    </div>
                </div>

                <div class="data--card light-purple">
                    <div class="card--header">
                        <div class="amount">
                            <span class="title">
                               STUDIO 
                            </span>
                            <span class="amount--value">
                                10
                            </span>
                        </div>
                    </div>
                </div>

            </div>
        </div>

        
    </div>
</body>
</html>
