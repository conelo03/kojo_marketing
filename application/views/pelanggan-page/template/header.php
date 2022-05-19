<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title><?= $title?></title>

    <!-- General CSS Files -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

    <!-- CSS Libraries -->

    <link rel="stylesheet" href="<?= base_url(); ?>assets/vendor/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="<?= base_url(); ?>assets/vendor/bootstrap-select/css/bootstrap-select.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/vendor/izitoast/css/iziToast.min.css'?>"/>

    <!-- Template CSS -->
    <link rel="stylesheet" href="<?= base_url(); ?>assets/css/style.css">
    <link rel="stylesheet" href="<?= base_url(); ?>assets/css/components.css">
    <style type="text/css">
        .checked-star {
            color: orange;
        }
        .star-cb-group {
      /* remove inline-block whitespace */
      font-size: 0;
      /* flip the order so we can use the + and ~ combinators */
      unicode-bidi: bidi-override;
      direction: rtl;
      /* the hidden clearer */
    }
    .star-cb-group * {
      font-size: 1rem;
    }
    .star-cb-group > input {
      display: none;
    }
    .star-cb-group > input + label {
      /* only enough room for the star */
      display: inline-block;
      overflow: hidden;
      text-indent: 9999px;
      width: 1.1em;
      white-space: nowrap;
      cursor: pointer;
    }
    .star-cb-group > input + label:before {
      display: inline-block;
      text-indent: -9999px;
      font-family: "Font Awesome 5 Free";
      content: "\f005";
      color: #888;
      font-weight: 900;
    }
    .star-cb-group > input:checked ~ label:before, .star-cb-group > input + label:hover ~ label:before, .star-cb-group > input + label:hover:before {
      font-family: "Font Awesome 5 Free";
      content: "\f005";
      color: orange;
      box-sizing: border-box;
      font-weight: 900;
    }
    .star-cb-group > .star-cb-clear + label {
      text-indent: -9999px;
      width: .5em;
      margin-left: -.5em;
    }
    .star-cb-group > .star-cb-clear + label:before {
      width: .5em;
    }
    .star-cb-group:hover > input + label:before {
      font-family: "Font Awesome 5 Free";
      content: "\f005";
      color: #888;
      text-shadow: none;
      font-weight: 900;
    }
    .star-cb-group:hover > input + label:hover ~ label:before, .star-cb-group:hover > input + label:hover:before {
      font-family: "Font Awesome 5 Free";
      content: "\f005";
      color: orange;
      box-sizing: border-box;
      font-weight: 900;
    }
        .rate {
        
            float: left;
        }
        .rate:not(:checked) > input {
            position:absolute;
            top:-9999px;
        }
        .rate:not(:checked) > label {
            float:right;
            width:1em;
            overflow:hidden;
            white-space:nowrap;
            cursor:pointer;
            font-size:30px;
            color:#ccc;
        }
        .rate:not(:checked) > label:before {
            content: '★ ';
        }
        .rate > input:checked ~ label {
            color: #ffc700;    
        }
        .rate:not(:checked) > label:hover,
        .rate:not(:checked) > label:hover ~ label {
            color: #deb217;  
        }
        .rate > input:checked + label:hover,
        .rate > input:checked + label:hover ~ label,
        .rate > input:checked ~ label:hover,
        .rate > input:checked ~ label:hover ~ label,
        .rate > label:hover ~ input:checked ~ label {
            color: #c59b08;
        }
    </style>
</head>

<body class="layout-3">