<?php
require 'includes/common.php';
 if(!isset($_SESSION['id'])){
header('location: index.php');}
if($_SESSION['role']==2){
header('location: doctor-page.php');}
if($_SESSION['role']==3){
header('location: patient-page.php');}
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="description" content="">
        <meta name="author" content="">
        <!-- FOR NORMAL BOOTSTRAP -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
        <!--FOR FONT AWESOME ICONS AND FONTS-->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <!--FOR BOOTSTRAP FORMS-->
        <link rel="canonical" href="https://getbootstrap.com/docs/3.4/examples/signin/">
        <link href="https://getbootstrap.com/docs/3.4/dist/css/bootstrap.min.css" rel="stylesheet">
        <link href="https://getbootstrap.com/docs/3.4/assets/css/ie10-viewport-bug-workaround.css" rel="stylesheet">
        <script src="https://getbootstrap.com/docs/3.4/assets/js/ie-emulation-modes-warning.js"></script>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Dosis:wght@500&display=swap" rel="stylesheet">
        <title></title>
        <link rel="stylesheet" href="CSS/style.css">
        <link rel="stylesheet" href="CSS/login.css">
        <style>
            .hov a:hover {
             text-decoration: none;
           }
           header{
             background: white;
             height: 23vh;
           }
           header li a{
             color: black;
           }
           header li a:hover{
             color: black
           }
           nav{
             padding-top: 1.5rem;
           }
           .heading{
             font-family: 'Dosis', sans-serif;
             font-size: 6rem;
           }
           .heading span{
             color: #8bcdcd;
           }
           .row {
      margin-bottom: 20px;
    }

    .button.button-small {
      height: 30px;
      line-height: 30px;
      padding: 0px 10px;
    }

    td input[type=text],
    td select {
      width: 100%;
      height: 30px;
      margin: 0;
      padding: 2px 8px;
    }

    th:last-child {
      text-align: right;
    }

    td:last-child {
      text-align: right;
    }

    td:last-child .button {
      width: 30px;
      height: 30px;
      text-align: center;
      padding: 0px;
      margin-bottom: 0px;
      margin-right: 5px;
      background-color: #FFF;
    }

    td:last-child .button .fa {
      line-height: 30px;
      width: 30px;
      color: #8bcdcd;
    }
         </style>
  </head>
  <body style="background-color: white; padding-bottom: 0; padding-top: 0;">
    <header>
        <div class="menu-toggle" id="hamburger">
          <i class="fas fa-bars"></i>
        </div>
        <div class="overlay"></div>
        <div class="container hov">
        <nav>
    <h1 class="brand"><a href="index.php" style="color: black"><span>M</span>ed<span>D</span>oc</a></h1>
    <ul>
      <li><a href="doctor-page.php">Dashboard</a></li>
      <li><a href="doctor-page.php">Appointment Requests</a></li>
      <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Settings<b class="caret"></b></a>
        <ul class="dropdown-menu">
          <li> <a href="doctor-profile.php">My Profile</a></li>
          <li> <a href="#" style="color: black">Change Password</a></li>
        </ul>
      </li>
      <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown"> <img src="Images/user.png" alt=""> <b class="caret"></b></a>
        <ul class="dropdown-menu">
          <li> <a href="#" style="color: black">Log Out</a></li>
        </ul>
      </li>
    </ul>
  </nav>
        </div>
      </header>
    <div class="container">
      <div class="row text-center">
        <br><br><br>
        <h1 class="heading"><span>D</span>octors <span>D</span>ata</h1>
      </div>
      <div class="row">
      <div class="col-md-12">
        <br>
        <button class="btn btn-default pull-right add-row"><i class="fa fa-plus"></i>&nbsp;&nbsp; Add Row</button>
      </div>
    </div>
  
    <div class="row">
      <div class="col-md-12">
        <table class="table table-bordered" id="editableTable">
          <thead>
            <tr>
              <th>Doctor's Name</th>
              <th>Department</th>
              <th>Age</th>
              <th>Gender</th>
              <th>Qualification</th>
              <th>Contact Number</th>
              <th>Email ID</th>
              <th>Edit</th>
            </tr>
          </thead>
          <tbody>
            <tr data-id="1">
              <td data-field="name">Dr. Dave Gamache</td>
              <td data-field="department">Neurology</td>
              <td data-field="age">26</td>
              <td data-field="gender">Male</td>
              <td data-field="qualification">abc</td>
              <td data-field="contact">1234567890</td>
              <td data-field="email">abc@gmail.com</td>
              <td>
                <a class="button button-small edit" title="Edit">
                  <i class="fa fa-pencil"></i>
                </a>
                
                <a class="button button-small edit" title="Delete">
                  <i class="fa fa-trash"></i>
                </a>
              </td>
            </tr>
            <tr data-id="2">
              <td data-field="name">Dr. Dave Gamache</td>
              <td data-field="department">Neurology</td>
              <td data-field="age">26</td>
              <td data-field="gender">Male</td>
              <td data-field="qualification">abc</td>
              <td data-field="contact">1234567890</td>
              <td data-field="email">abc@gmail.com</td>
              <td>
                <a class="button button-small edit" title="Edit">
                  <i class="fa fa-pencil"></i>
                </a>
                
                <a class="button button-small edit" title="Delete">
                  <i class="fa fa-trash"></i>
                </a>
              </td>
            </tr>
            <tr data-id="3">
              <td data-field="name">Dr. Dave Gamache</td>
              <td data-field="department">Neurology</td>
              <td data-field="age">26</td>
              <td data-field="gender">Male</td>
              <td data-field="qualification">abc</td>
              <td data-field="contact">1234567890</td>
              <td data-field="email">abc@gmail.com</td>
              <td>
                <a class="button button-small edit" title="Edit">
                  <i class="fa fa-pencil"></i>
                </a>
                
                <a class="button button-small edit" title="Delete">
                  <i class="fa fa-trash"></i>
                </a>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>
  <br><br><br>
  <section id="footer">
        <img src="Images/footer-img.png" class="footer-img">
        <div class="title-text">
          <p>CONTACT</p>
        </div>
        <div class="social-links">
          <i class="fa fa-facebook"></i>
          <i class="fa fa-twitter"></i>
          <i class="fa fa-youtube-play"></i>
          <i class="fa fa-linkedin"></i>
          <p>copyright MedDoc 2020</p>
        </div>
      </section>
  <script>
    (function ($, window, document, undefined) {
      var pluginName = "editable",
        defaults = {
          keyboard: true,
          dblclick: true,
          button: true,
          buttonSelector: ".edit",
          maintainWidth: true,
          dropdowns: {},
          edit: function () {},
          save: function () {},
          cancel: function () {}
        };

      function editable(element, options) {
        this.element = element;
        this.options = $.extend({}, defaults, options);

        this._defaults = defaults;
        this._name = pluginName;

        this.init();
      }

      editable.prototype = {
        init: function () {
          this.editing = false;

          if (this.options.dblclick) {
            $(this.element)
              .css('cursor', 'pointer')
              .bind('dblclick', this.toggle.bind(this));
          }

          if (this.options.button) {
            $(this.options.buttonSelector, this.element)
              .bind('click', this.toggle.bind(this));
          }
        },

        toggle: function (e) {
          e.preventDefault();

          this.editing = !this.editing;

          if (this.editing) {
            this.edit();
          } else {
            this.save();
          }
        },

        edit: function () {
          var instance = this,
            values = {};

          $('td[data-field]', this.element).each(function () {
            var input,
              field = $(this).data('field'),
              value = $(this).text(),
              width = $(this).width();

            values[field] = value;

            $(this).empty();

            if (instance.options.maintainWidth) {
              $(this).width(width);
            }

            if (field in instance.options.dropdowns) {
              input = $('<select></select>');

              for (var i = 0; i < instance.options.dropdowns[field].length; i++) {
                $('<option></option>')
                  .text(instance.options.dropdowns[field][i])
                  .appendTo(input);
              };

              input.val(value)
                .data('old-value', value)
                .dblclick(instance._captureEvent);
            } else {
              input = $('<input type="text" />')
                .val(value)
                .data('old-value', value)
                .dblclick(instance._captureEvent);
            }

            input.appendTo(this);

            if (instance.options.keyboard) {
              input.keydown(instance._captureKey.bind(instance));
            }
          });

          this.options.edit.bind(this.element)(values);
        },

        save: function () {
          var instance = this,
            values = {};

          $('td[data-field]', this.element).each(function () {
            var value = $(':input', this).val();

            values[$(this).data('field')] = value;

            $(this).empty()
              .text(value);
          });

          this.options.save.bind(this.element)(values);
        },

        cancel: function () {
          var instance = this,
            values = {};

          $('td[data-field]', this.element).each(function () {
            var value = $(':input', this).data('old-value');

            values[$(this).data('field')] = value;

            $(this).empty()
              .text(value);
          });

          this.options.cancel.bind(this.element)(values);
        },

        _captureEvent: function (e) {
          e.stopPropagation();
        },

        _captureKey: function (e) {
          if (e.which === 13) {
            this.editing = false;
            this.save();
          } else if (e.which === 27) {
            this.editing = false;
            this.cancel();
          }
        }
      };

      $.fn[pluginName] = function (options) {
        return this.each(function () {
          if (!$.data(this, "plugin_" + pluginName)) {
            $.data(this, "plugin_" + pluginName,
              new editable(this, options));
          }
        });
      };

    })(jQuery, window, document);

    editTable();

    //custome editable starts
    function editTable() {

      $(function () {
        var pickers = {};

        $('table tr').editable({
          dropdowns: {
            gender: ['Male', 'Female', 'Others']
          },
          edit: function (values) {
            $(".edit i", this)
              .removeClass('fa-pencil')
              .addClass('fa-save')
              .attr('title', 'Save');

            pickers[this] = new Pikaday({
              field: $("td[data-field=birthday] input", this)[0],
              format: 'MMM D, YYYY'
            });
          },
          save: function (values) {
            $(".edit i", this)
              .removeClass('fa-save')
              .addClass('fa-pencil')
              .attr('title', 'Edit');

            if (this in pickers) {
              pickers[this].destroy();
              delete pickers[this];
            }
          },
          cancel: function (values) {
            $(".edit i", this)
              .removeClass('fa-save')
              .addClass('fa-pencil')
              .attr('title', 'Edit');

            if (this in pickers) {
              pickers[this].destroy();
              delete pickers[this];
            }
          }
        });
      });

    }

    $(".add-row").click(function () {
      $("#editableTable").find("tbody tr:first").before(
        "<tr><td data-field='name'></td><td data-field='name'></td><td data-field='name'></td><td data-field='name'></td><td data-field='name'></td><td data-field='name'></td><td><a class='button button-small edit' title='Edit'><i class='fa fa-pencil'></i></a> <a class='button button-small' title='Delete'><i class='fa fa-trash'></i></a></td></tr>"
        );
      editTable();
      setTimeout(function () {
        $("#editableTable").find("tbody tr:first td:last a[title='Edit']").click();
      }, 200);

      setTimeout(function () {
        $("#editableTable").find("tbody tr:first td:first input[type='text']").focus();
      }, 300);

      $("#editableTable").find("a[title='Delete']").unbind('click').click(function (e) {
        $(this).closest("tr").remove();
      });

    });

    function myFunction() {

    }

    $("#editableTable").find("a[title='Delete']").click(function (e) {
      var x;
      if (confirm("Are you sure you want to delete entire row?") == true) {
        $(this).closest("tr").remove();
      } else {

      }
    });
  </script>
  <script>
      /*Nav Bar js*/
  var open = document.getElementById('hamburger');
  var changeIcon = true;

  open.addEventListener("click", function() {

    var overlay = document.querySelector('.overlay');
    var nav = document.querySelector('nav');
    var icon = document.querySelector('.menu-toggle i');

    overlay.classList.toggle("menu-open");
    nav.classList.toggle("menu-open");

    if (changeIcon) {
      icon.classList.remove("fa-bars");
      icon.classList.add("fa-times");

      changeIcon = false;
    } else {
      icon.classList.remove("fa-times");
      icon.classList.add("fa-bars");
      changeIcon = true;
    }
  });
      </script>
</body>

</html>