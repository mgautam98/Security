<?php
session_start();
require 'authenticate.php';
require 'branding.php';

require_once 'config/security_config.php';
$_SESSION["name"] = "quip";
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!--Import Google Icon Font-->
    <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link type="text/css" rel="stylesheet" href="materialize/css/materialize.min.css"  media="screen,projection"/>
    <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
    <script type="text/javascript" src="materialize/js/materialize.min.js"></script>
    <script src="js/jquery.form.js"></script>
    <script src="https://apis.google.com/js/client:platform.js?onload=start" async defer></script>
    <link rel="stylesheet" href="css/style.css">
    <title><?php print $branding_title; ?></title>
  </head>

  <body>
    <!--Import jQuery before materialize.js-->


    <div class="navbar-fixed">
      <nav class="blue darken-3">
        <div class="nav-wrapper">
          <a href="#!" class="brand-logo">
            <i class="microscope">
              <img src="svg/camic_vector.svg" id="svg1" class="camic_logo" width="100%" height="100%" viewBox="0 0 640 480" preserveAspectRatio="xMaxYMax"/>
            </i>
            <?php print $branding_title; ?>
          </a>
        </div>
      </nav>
    </div>

    <div id="modal1" class="modal modal-fixed-footer">
      <div class="modal-content">
        <div class="container">
          <h4> Upload Images </h4>
          <p>Pick an unique Image ID (Letters, Numbers, Dash(-), and Underscore(_) only) and upload an image file.
          <form id="uploadme" role="form" action="/quip-loader/submitData" method="post" enctype="multipart/form-data">
            <div class="input-field col s12">
              <input id="imageid" name="case_id" type="text" pattern="^[a-zA-Z0-9-_]+$" class="validate">
              <label for="imageid">Image ID</label>
            </div>
            <div class="file-field input-field">
              <div class="btn">
                <span>File</span>
                <input id="upload_image" name="upload_image" type="file">
              </div>
              <div class="file-path-wrapper">
                <input class="file-path validate" type="text">
              </div>
            </div>
            <button id="submitButton" type="submit" value="Upload Image" class="btn-large blue waves-effect waves-light btn" action="submit">
            Upload <i class="material-icons right">send</i>
            </button>
          </form>
          <div class="progress">
            <div id="progressbar" class="determinate" style="width: 0%"></div>
          </div>
          <div id="status"></div>
          <br>
        </div>
      </div>
      <div class="modal-footer">
        <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat ">Close</a>
      </div>
    </div>

    <div id="modal_about" class="modal modal-fixed-footer">
      <div class="modal-content">
        <div class="container">
          <h4> About </h4>
          <p>This site hosts web accessible applications and tools designed to support analysis, management, and exploration of whole slide tissue images for cancer research. The goals of the parent project are to develop, deploy, and disseminate a suite of open source tools and integrated informatics platform that will facilitate multi-scale, correlative analyses of high resolution whole slide tissue image data, spatially mapped genetics and molecular data. The software and methods will enable cancer researchers to assemble and visualize detailed, multi-scale descriptions of tissue morphologic changes and to identify and analyze features across individuals and cohorts.</p>
          <p>The current set of applications has been developed and supported by several frameworks and middleware systems including:
          <ul>
            <li><b>caMicroscope</b>: Digital pathology data management, visualization and analysis platform. It also includes FeatureDB, a database based on NoSQL technologies for management and query of segmentation results and features from whole slide tissue image analysis.</li>
          </ul></p>
          <p>This work is supported in part by NCI U24 CA18092401A1 (Tools to Analyze Morphology and Spatially Mapped Molecular Data, PI: Joel Saltz), NCIP/Leidos 14X138 (caMicroscope – A Digital Pathology Integrative Query System; PI: Ashish Sharma), R01LM011119-01 (PI: Joel Saltz), and 2R01LM009239-05A1 (PIs: David Foran and Joel Saltz). The U24 project is a collaboration between Stony Brook University, Emory University, Oak Ridge National Laboratory and Yale University. The caMicroscope project is a collaboration between Emory University, Washington University in St. Louis and Stony Brook University.</p>
        </div>
      </div>
      <div class="modal-footer">
        <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat ">Close</a>
      </div>
    </div>

    <main>
      <div class="container">
        <div class="row">
          <a href="#modal_about">
            <div class="col s12 m6 l4 xl3">
              <div class="card" id="upload">
                <div class="card-image">
                  <div class="darkimg">
                    <img src="img/upload.jpg">
                  </div>
                  <span class="card-title">About</span>
                </div>
                <div class="card-content">
                  <p class="card-text flow-text"><b>About</b>: Learn about the tools at your disposal. </p>
                </div>
              </div>
            </div>
          </a>
          <a href="#modal1">
            <div class="col s12 m6 l4 xl3">
              <div class="card" id="upload">
                <div class="card-image">
                  <div class="darkimg">
                    <img src="img/upload.jpg">
                  </div>
                  <span class="card-title">Upload</span>
                </div>
                <div class="card-content">
                  <p class="card-text flow-text"><b>Image Uploader</b>: Upload images here for collaboration, annotation and analysis. </p>
                </div>
              </div>
            </div>
          </a>
          <a href="/FlexTables/index.php">
            <div class="col s12 m6 l4 xl3">
              <div class="card" id="view">
                <div class="card-image">
                  <div class="darkimg">
                    <img src="img/view.png">
                  </div>
                  <span class="card-title">View</span>
                </div>
                <div class="card-content">
                  <p class="card-text flow-text"><b>caMicroscope</b>: View and annotate whole slide tissue images and nuclear segmentations.</p>
                </div>
              </div>
            </div>
          </a>
          <a href="/featurescapeapps/featurescape/u24Preview.php">
            <div class="col s12 m6 l4 xl3">
              <div class="card" id="understand">
                <div class="card-image">
                  <div class="darkimg">
                    <img src="img/understand.jpg">
                  </div>
                  <span class="card-title">Understand</span>
                </div>
                <div class="card-content">
                  <p class="card-text flow-text"><b>FeatureScape</b>: A visual analytics platform for exploring slide-level imaging features generated by analysis of whole slide tissue images to QuIP.</p>
                </div>
              </div>
            </div>
          </a>
          <a href="https://github.com/SBU-BMI/quip_distro">
            <div class="col s12 m6 l4 xl3">
              <div class="card" id="distribute">
                <div class="card-image">
                  <div class="darkimg">
                    <img src="img/dist.jpg">
                  </div>
                  <span class="card-title">Distribute</span>
                </div>
                <div class="card-content">
                  <p class="card-text flow-text" ><b>QuIP distribution and installation</b>: Report issues on QuIP or Install/Distribute this software.</p>
                </div>
              </div>
            </div>
          </a>

          <a href="http://imaging.cci.emory.edu/wiki/display/CAMIC/Home">
            <div class="col s12 m6 l4 xl3">
              <div class="card" id="help">
                <div class="card-image">
                  <div class="darkimg">
                    <img src="img/view.png">
                  </div>
                  <span class="card-title">Documentation &amp; Help</span>
                </div>
                <div class="card-content">
                  <p class="card-text flow-text"><b>CAMIC Wiki</b>: Documentation and user guide for caMicroscope.</p>
                </div>
              </div>
            </div>
          </a>

        </div>
      </div>
    </main>

    <div class="page-footer blue darken-4">
      <p style="color:white;">U24 CA18092401A1, <b>Tools to Analyze Morphology and Spatially Mapped Molecular Data</b>; <i>Joel Saltz
        PI</i> Stony Brook/Emory/Oak Ridge/Yale<br>NCIP/Leidos 14X138, <b>caMicroscope &ndash; A Digital Pathology
        Integrative Query System</b>; <i>Ashish Sharma PI</i> Emory/WUSTL/Stony Brook<br />
      </p>
    </div>
    <script src="js/uploader.js"></script>
  </body>
</html>
