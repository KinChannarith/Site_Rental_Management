@extends('layouts/app')
@section("content")
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Site Rental-Dashboard</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <!-- Styles -->
        <style>
            /*! normalize.css v8.0.1 | MIT License | github.com/necolas/normalize.css */html{line-height:1.15;-webkit-text-size-adjust:100%}body{margin:0}a{background-color:transparent}[hidden]{display:none}html{font-family:system-ui,-apple-system,BlinkMacSystemFont,Segoe UI,Roboto,Helvetica Neue,Arial,Noto Sans,sans-serif,Apple Color Emoji,Segoe UI Emoji,Segoe UI Symbol,Noto Color Emoji;line-height:1.5}*,:after,:before{box-sizing:border-box;border:0 solid #e2e8f0}a{color:inherit;text-decoration:inherit}svg,video{display:block;vertical-align:middle}video{max-width:100%;height:auto}.bg-white{--bg-opacity:1;background-color:#fff;background-color:rgba(255,255,255,var(--bg-opacity))}.bg-gray-100{--bg-opacity:1;background-color:#f7fafc;background-color:rgba(247,250,252,var(--bg-opacity))}.border-gray-200{--border-opacity:1;border-color:#edf2f7;border-color:rgba(237,242,247,var(--border-opacity))}.border-t{border-top-width:1px}.flex{display:flex}.grid{display:grid}.hidden{display:none}.items-center{align-items:center}.justify-center{justify-content:center}.font-semibold{font-weight:600}.h-5{height:1.25rem}.h-8{height:2rem}.h-16{height:4rem}.text-sm{font-size:.875rem}.text-lg{font-size:1.125rem}.leading-7{line-height:1.75rem}.mx-auto{margin-left:auto;margin-right:auto}.ml-1{margin-left:.25rem}.mt-2{margin-top:.5rem}.mr-2{margin-right:.5rem}.ml-2{margin-left:.5rem}.mt-4{margin-top:1rem}.ml-4{margin-left:1rem}.mt-8{margin-top:2rem}.ml-12{margin-left:3rem}.-mt-px{margin-top:-1px}.max-w-6xl{max-width:72rem}.min-h-screen{min-height:100vh}.overflow-hidden{overflow:hidden}.p-6{padding:1.5rem}.py-4{padding-top:1rem;padding-bottom:1rem}.px-6{padding-left:1.5rem;padding-right:1.5rem}.pt-8{padding-top:2rem}.fixed{position:fixed}.relative{position:relative}.top-0{top:0}.right-0{right:0}.shadow{box-shadow:0 1px 3px 0 rgba(0,0,0,.1),0 1px 2px 0 rgba(0,0,0,.06)}.text-center{text-align:center}.text-gray-200{--text-opacity:1;color:#edf2f7;color:rgba(237,242,247,var(--text-opacity))}.text-gray-300{--text-opacity:1;color:#e2e8f0;color:rgba(226,232,240,var(--text-opacity))}.text-gray-400{--text-opacity:1;color:#cbd5e0;color:rgba(203,213,224,var(--text-opacity))}.text-gray-500{--text-opacity:1;color:#a0aec0;color:rgba(160,174,192,var(--text-opacity))}.text-gray-600{--text-opacity:1;color:#718096;color:rgba(113,128,150,var(--text-opacity))}.text-gray-700{--text-opacity:1;color:#4a5568;color:rgba(74,85,104,var(--text-opacity))}.text-gray-900{--text-opacity:1;color:#1a202c;color:rgba(26,32,44,var(--text-opacity))}.underline{text-decoration:underline}.antialiased{-webkit-font-smoothing:antialiased;-moz-osx-font-smoothing:grayscale}.w-5{width:1.25rem}.w-8{width:2rem}.w-auto{width:auto}.grid-cols-1{grid-template-columns:repeat(1,minmax(0,1fr))}@media (min-width:640px){.sm\:rounded-lg{border-radius:.5rem}.sm\:block{display:block}.sm\:items-center{align-items:center}.sm\:justify-start{justify-content:flex-start}.sm\:justify-between{justify-content:space-between}.sm\:h-20{height:5rem}.sm\:ml-0{margin-left:0}.sm\:px-6{padding-left:1.5rem;padding-right:1.5rem}.sm\:pt-0{padding-top:0}.sm\:text-left{text-align:left}.sm\:text-right{text-align:right}}@media (min-width:768px){.md\:border-t-0{border-top-width:0}.md\:border-l{border-left-width:1px}.md\:grid-cols-2{grid-template-columns:repeat(2,minmax(0,1fr))}}@media (min-width:1024px){.lg\:px-8{padding-left:2rem;padding-right:2rem}}@media (prefers-color-scheme:dark){.dark\:bg-gray-800{--bg-opacity:1;background-color:#2d3748;background-color:rgba(45,55,72,var(--bg-opacity))}.dark\:bg-gray-900{--bg-opacity:1;background-color:#1a202c;background-color:rgba(26,32,44,var(--bg-opacity))}.dark\:border-gray-700{--border-opacity:1;border-color:#4a5568;border-color:rgba(74,85,104,var(--border-opacity))}.dark\:text-white{--text-opacity:1;color:#fff;color:rgba(255,255,255,var(--text-opacity))}.dark\:text-gray-400{--text-opacity:1;color:#cbd5e0;color:rgba(203,213,224,var(--text-opacity))}}
        </style>

        <style>
            body {
                font-family: 'Nunito', sans-serif;
            }
        </style>
    </head>
<body class="sidebar-menu-collapsed">
  <div class="se-pre-con"></div>
    <section>
    
    <!-- main content start -->
    <div class="main-content">

    <!-- content -->
    <div class="container-fluid content-top-gap">

        <nav aria-label="breadcrumb">
        <ol class="breadcrumb my-breadcrumb">
            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
        </ol>
        </nav>
        <div class="welcome-msg pt-3 pb-4">
        <h1>Hi <span class="text-primary">User
        </span>, Welcome Back</h1>
        <p>Very detailed & featured admin.</p>
        </div>

        <!-- statistics data -->
        <div class="statistics">
        <div class="row">
            <div class="col-xl-6 pr-xl-2">
            <div class="row">
                <div class="col-sm-6 pr-sm-2 statistics-grid">
                <div class="card card_border border-primary-top p-4">
                    <i class="lnr lnr-users"> </i>
                    <h3 class="text-primary number">29.75 M</h3>
                    <p class="stat-text">Total Users</p>
                </div>
                </div>
                <div class="col-sm-6 pl-sm-2 statistics-grid">
                <div class="card card_border border-primary-top p-4">
                    <i class="lnr lnr-eye"> </i>
                    <h3 class="text-secondary number">51.25 K</h3>
                    <p class="stat-text">Daily Visitors</p>
                </div>
                </div>
            </div>
            </div>
            <div class="col-xl-6 pl-xl-2">
            <div class="row">
                <div class="col-sm-6 pr-sm-2 statistics-grid">
                <div class="card card_border border-primary-top p-4">
                    <i class="lnr lnr-cloud-download"> </i>
                    <h3 class="text-success number">166.89 M</h3>
                    <p class="stat-text">Downloads</p>
                </div>
                </div>
                <div class="col-sm-6 pl-sm-2 statistics-grid">
                <div class="card card_border border-primary-top p-4">
                    <i class="lnr lnr-cart"> </i>
                    <h3 class="text-danger number">1,250k</h3>
                    <p class="stat-text">Purchased</p>
                </div>
                </div>
            </div>
            </div>
        </div>
        </div>
        <!-- //statistics data -->

        <!-- charts -->
        <div class="chart">
        <div class="row">
            <div class="col-lg-6 pr-lg-2 chart-grid">
            <div class="card text-center card_border">
                <div class="card-header chart-grid__header">
                Bar Chart
                </div>
                <div class="card-body">
                <!-- bar chart -->
                <div id="container">
                    <canvas id="barchart"></canvas>
                </div>
                <!-- //bar chart -->
                </div>
                <div class="card-footer text-muted chart-grid__footer">
                Updated 2 hours ago
                </div>
            </div>
            </div>
            <div class="col-lg-6 pl-lg-2 chart-grid">
            <div class="card text-center card_border">
                <div class="card-header chart-grid__header">
                Line Chart
                </div>
                <div class="card-body">
                <!-- line chart -->
                <div id="container">
                    <canvas id="linechart"></canvas>
                </div>
                <!-- //line chart -->
                </div>
                <div class="card-footer text-muted chart-grid__footer">
                Updated just now
                </div>
            </div>
            </div>
        </div>
        </div>
        <!-- //charts -->

        <!-- chatting -->
        <div class="data-tables">
        <div class="row">
            <div class="col-lg-12 chart-grid mb-4">
            <div class="card card_border p-4">
                <div class="card-header chart-grid__header pl-0 pt-0">
                Chatting
                </div>
                <div class="messaging">
                <div class="inbox_msg">
                    <div class="inbox_people">
                    <div class="headind_srch">
                        <div class="srch_bar">
                        <div class="stylish-input-group">
                            <input type="text" class="search-bar" placeholder="Search Chat">
                            <span class="input-group-addon">
                            <button type="button"> <i class="fa fa-search" aria-hidden="true"></i> </button>
                            </span> </div>
                        </div>
                    </div>
                    <div class="inbox_chat">
                        <div class="chat_list active_chat">
                        <div class="chat_people">
                            <div class="chat_img"> <img src="assets/images/avatar5.jpg" alt="Alexander" class="img-fluid">
                            </div>
                            <div class="chat_ib">
                            <h5>Alexander <span class="chat_date">1 hour ago</span></h5>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
                            </div>
                        </div>
                        </div>
                        <div class="chat_list">
                        <div class="chat_people">
                            <div class="chat_img"> <img src="assets/images/avatar3.jpg" alt="Anderson" class="img-fluid">
                            </div>
                            <div class="chat_ib">
                            <h5>Anderson <span class="chat_date">5 hours ago</span></h5>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
                            </div>
                        </div>
                        </div>
                        <div class="chat_list">
                        <div class="chat_people">
                            <div class="chat_img"> <img src="assets/images/avatar5.jpg" alt="Isabella" class="img-fluid">
                            </div>
                            <div class="chat_ib">
                            <h5>Isabella <span class="chat_date">Yesterday</span></h5>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
                            </div>
                        </div>
                        </div>
                        <div class="chat_list">
                        <div class="chat_people">
                            <div class="chat_img"> <img src="assets/images/avatar4.jpg" alt="Charlotte" class="img-fluid">
                            </div>
                            <div class="chat_ib">
                            <h5>Charlotte <span class="chat_date">Mar 04</span></h5>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
                            </div>
                        </div>
                        </div>
                        <div class="chat_list">
                        <div class="chat_people">
                            <div class="chat_img"> <img src="assets/images/avatar2.jpg" alt="Davidson" class="img-fluid">
                            </div>
                            <div class="chat_ib">
                            <h5>Davidson <span class="chat_date">Feb 18</span></h5>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
                            </div>
                        </div>
                        </div>
                        <div class="chat_list">
                        <div class="chat_people">
                            <div class="chat_img"> <img src="assets/images/avatar1.jpg" alt="Elexa ker" class="img-fluid">
                            </div>
                            <div class="chat_ib">
                            <h5>Elexa ker <span class="chat_date">Feb 04</span></h5>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
                            </div>
                        </div>
                        </div>
                        <div class="chat_list">
                        <div class="chat_people">
                            <div class="chat_img"> <img src="assets/images/avatar4.jpg" alt="Charlotte" class="img-fluid">
                            </div>
                            <div class="chat_ib">
                            <h5>Charlotte <span class="chat_date">Jan 28</span></h5>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
                            </div>
                        </div>
                        </div>
                    </div>
                    </div>
                    <div class="mesgs">
                    <div class="msg_history">
                        <div class="incoming_msg">
                        <div class="incoming_msg_img"> <img src="assets/images/avatar5.jpg" alt="Alexander"
                            class="img-fluid"> </div>
                        <div class="received_msg">
                            <div class="received_withd_msg">
                            <p>Coming along nicely, we've got a Lorem ipsum dolor sit amet consectetur adipisicing elit.
                            </p>
                            <span class="time_date"> 10:05 AM | Mar 9</span>
                            </div>
                        </div>
                        </div>
                        <div class="outgoing_msg">
                        <div class="sent_msg">
                            <p>Great start, I've added some Lorem ipsum dolor sit amet. </p>
                            <span class="time_date"> 12:15 PM | Mar 9</span>
                        </div>
                        </div>
                        <div class="incoming_msg">
                        <div class="incoming_msg_img"> <img src="assets/images/avatar5.jpg" alt="Alexander"
                            class="img-fluid"> </div>
                        <div class="received_msg">
                            <div class="received_withd_msg">
                            <p>Sed ut perspiciatis unde omnis iste natus error sit</p>
                            <span class="time_date"> 09:16 AM | Yesterday</span>
                            </div>
                        </div>
                        </div>
                        <div class="outgoing_msg">
                        <div class="sent_msg">
                            <p>But I must explain to you.</p>
                            <span class="time_date"> 03:15 PM | Today</span>
                        </div>
                        </div>
                        <div class="incoming_msg">
                        <div class="incoming_msg_img"> <img src="assets/images/avatar5.jpg" alt="Alexander"
                            class="img-fluid"> </div>
                        <div class="received_msg">
                            <div class="received_withd_msg">
                            <p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium
                                voluptatum deleniti atque corrupti quos dolores.</p>
                            <span class="time_date"> 03:16 PM | Today</span>
                            </div>
                        </div>
                        </div>
                    </div>
                    <div class="type_msg">
                        <div class="input_msg_write">
                        <input type="text" class="write_msg" placeholder="Type a message" />
                        <button class="msg_send_btn" type="button"><i class="fa fa-paper-plane-o"
                            aria-hidden="true"></i></button>
                        </div>
                    </div>
                    </div>
                </div>
                </div>
            </div>
            </div>
        </div>
        </div>
        <!-- //chatting -->

        <!-- accordions -->
        <div class="accordions">
        <div class="row">
            <!-- accordion style 1 -->
            <div class="col-lg-12 mb-4">
            <div class="card card_border">
                <div class="card-header chart-grid__header">
                Bootstrap Accordions
                </div>
                <div class="card-body">
                <div class="accordion" id="accordionExample">
                    <div class="card">
                    <div class="card-header bg-white p-0" id="headingOne">
                        <a href="#" class="card__title p-3" data-toggle="collapse" data-target="#collapseOne"
                        aria-expanded="true" aria-controls="collapseOne">Collapsed accordion heading </a>
                    </div>

                    <div id="collapseOne" class="collapse show" aria-labelledby="headingOne"
                        data-parent="#accordionExample">
                        <div class="card-body para__style">
                        Nulla tincidunt quam justo, in tincidunt tortor sollicitudin a. Donec porta posuere
                        libero sed varius. Phasellus hendrerit commodo sem, at sagittis sapien semper quis.
                        Etiam vitae facilisis nibh. Maecenas erat nisl, blandit at nunc a, lobortis sagittis
                        ex. Maecenas pharetra pulvinar tincidunt.
                        </div>
                    </div>
                    </div>
                    <div class="card">
                    <div class="card-header bg-white p-0" id="headingTwo">
                        <a href="#" class="card__title p-3" data-toggle="collapse" data-target="#collapseTwo"
                        aria-expanded="false" aria-controls="collapseTwo">Click here to collapse accordion</a>
                    </div>
                    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                        <div class="card-body para__style">
                        Nulla tincidunt quam justo, in tincidunt tortor sollicitudin a. Donec porta posuere
                        libero sed varius. Phasellus hendrerit commodo sem, at sagittis sapien semper quis.
                        Etiam vitae facilisis nibh. Maecenas erat nisl, blandit at nunc a, lobortis sagittis
                        ex. Maecenas pharetra pulvinar tincidunt.
                        </div>
                    </div>
                    </div>
                    <div class="card">
                    <div class="card-header bg-white p-0" id="headingThree">
                        <a href="#" class="card__title p-3" data-toggle="collapse" data-target="#collapseThree"
                        aria-expanded="false" aria-controls="collapseThree">Click here to
                        collapse accordion</a>
                    </div>
                    <div id="collapseThree" class="collapse" aria-labelledby="headingThree"
                        data-parent="#accordionExample">
                        <div class="card-body para__style">
                        Nulla tincidunt quam justo, in tincidunt tortor sollicitudin a. Donec porta posuere
                        libero sed varius. Phasellus hendrerit commodo sem, at sagittis sapien semper quis.
                        Etiam vitae facilisis nibh. Maecenas erat nisl, blandit at nunc a, lobortis sagittis
                        ex. Maecenas pharetra pulvinar tincidunt.
                        </div>
                    </div>
                    </div>
                </div>
                </div>
            </div>
            </div>
            <!-- //accordion style 1 -->
        </div>
        </div>
        <!-- //accordions -->

        <!-- modals -->
        <section class="template-cards">
        <div class="card card_border">
            <div class="cards__heading">
            <h3>Modals - <span>2 different types of bootstrap modals</span></h3>
            </div>
            <div class="card-body pb-0">
            <div class="row">
                <div class="col-lg-6 pr-lg-2 chart-grid">
                <div class="card text-center card_border">
                    <div class="card-header chart-grid__header">
                    Demo modal
                    </div>
                    <div class="card-body">
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-primary btn-style" data-toggle="modal"
                        data-target="#exampleModal">
                        Launch demo
                    </button>

                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            </div>
                            <div class="modal-body">
                            ...
                            </div>
                            <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-success">Save changes</button>
                            </div>
                        </div>
                        </div>
                    </div>
                    </div>
                </div>
                </div>
                <div class="col-lg-6 chart-grid">
                <div class="card text-center card_border">
                    <div class="card-header chart-grid__header">
                    Vertical centered
                    </div>
                    <div class="card-body">
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-primary btn-style" data-toggle="modal"
                        data-target="#exampleModalCenter">
                        Launch demo
                    </button>
                    <!-- Modal -->
                    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog"
                        aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            </div>
                            <div class="modal-body">
                            ...
                            </div>
                            <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-success">Save changes</button>
                            </div>
                        </div>
                        </div>
                    </div>
                    </div>
                </div>
                </div>
            </div>
            </div>
        </div>
        </section>
        <!-- //modals -->

    </div>
    <!-- //content -->
    </div>
    <!-- main content end-->
    </section>
    <!--footer section start-->
    <footer class="dashboard">
    <p>&copy 2020 Collective. All Rights Reserved | Design by <a href="https://w3layouts.com/" target="_blank"
        class="text-primary">W3layouts.</a></p>
    </footer>
    <!--footer section end-->
    <!-- move top -->
    <button onclick="topFunction()" id="movetop" class="bg-primary" title="Go to top">
    <span class="fa fa-angle-up"></span>
    </button>
    

    </body>
 
</html>
@endsection
