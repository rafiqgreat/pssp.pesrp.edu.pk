<?php include viewPath('admin/includes/header'); ?>

<!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Ribbons</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Ribbons</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Ribbons</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <div class="row">
                  <div class="col-sm-4">
                    <div class="position-relative p-3 bg-gray" style="height: 180px">
                      <div class="ribbon-wrapper">
                        <div class="ribbon bg-primary">
                          Ribbon
                        </div>
                      </div>
                      Ribbon Default <br />
                      <small>.ribbon-wrapper.ribbon-lg .ribbon</small>
                    </div>
                  </div>
                  <div class="col-sm-4">
                    <div class="position-relative p-3 bg-gray" style="height: 180px">
                      <div class="ribbon-wrapper ribbon-lg">
                        <div class="ribbon bg-info">
                          Ribbon Large
                        </div>
                      </div>
                      Ribbon Large <br />
                      <small>.ribbon-wrapper.ribbon-lg .ribbon</small>
                    </div>
                  </div>
                  <div class="col-sm-4">
                    <div class="position-relative p-3 bg-gray" style="height: 180px">
                      <div class="ribbon-wrapper ribbon-xl">
                        <div class="ribbon bg-secondary">
                          Ribbon Extra Large
                        </div>
                      </div>
                      Ribbon Extra Large <br />
                      <small>.ribbon-wrapper.ribbon-xl .ribbon</small>
                    </div>
                  </div>
                </div>
                <div class="row mt-4">
                  <div class="col-sm-4">
                    <div class="position-relative p-3 bg-gray" style="height: 180px">
                      <div class="ribbon-wrapper ribbon-lg">
                        <div class="ribbon bg-success text-lg">
                          Ribbon
                        </div>
                      </div>
                      Ribbon Large <br /> with Large Text <br />
                      <small>.ribbon-wrapper.ribbon-lg .ribbon.text-lg</small>
                    </div>
                  </div>
                  <div class="col-sm-4">
                    <div class="position-relative p-3 bg-gray" style="height: 180px">
                      <div class="ribbon-wrapper ribbon-xl">
                        <div class="ribbon bg-warning text-lg">
                          Ribbon
                        </div>
                      </div>
                      Ribbon Extra Large <br /> with Large Text <br />
                      <small>.ribbon-wrapper.ribbon-xl .ribbon.text-lg</small>
                    </div>
                  </div>
                  <div class="col-sm-4">
                    <div class="position-relative p-3 bg-gray" style="height: 180px">
                      <div class="ribbon-wrapper ribbon-xl">
                        <div class="ribbon bg-danger text-xl">
                          Ribbon
                        </div>
                      </div>
                      Ribbon Extra Large <br /> with Extra Large Text <br />
                      <small>.ribbon-wrapper.ribbon-xl .ribbon.text-xl</small>
                    </div>
                  </div>
                </div>
                <div class="row mt-4">
                  <div class="col-sm-4">
                    <div class="position-relative">
                      <img src="<?php echo $url->assets ?>img/photo1.png" alt="Photo 1" class="img-fluid">
                      <div class="ribbon-wrapper ribbon-lg">
                        <div class="ribbon bg-success text-lg">
                          Ribbon
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-sm-4">
                    <div class="position-relative">
                      <img src="<?php echo $url->assets ?>img/photo2.png" alt="Photo 2" class="img-fluid">
                      <div class="ribbon-wrapper ribbon-xl">
                        <div class="ribbon bg-warning text-lg">
                          Ribbon
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-sm-4">
                    <div class="position-relative" style="min-height: 180px;">
                      <img src="<?php echo $url->assets ?>img/photo3.jpg" alt="Photo 3" class="img-fluid">
                      <div class="ribbon-wrapper ribbon-xl">
                        <div class="ribbon bg-danger text-xl">
                          Ribbon
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->


<?php include viewPath('admin/includes/footer'); ?>

<!-- Ion Slider -->
<script src="../../plugins/ion-rangeslider/js/ion.rangeSlider.min.js"></script>
<!-- Bootstrap slider -->
<script src="../../plugins/bootstrap-slider/bootstrap-slider.min.js"></script>
<script>
  $(function () {
    /* BOOTSTRAP SLIDER */
    $('.slider').bootstrapSlider()

    /* ION SLIDER */
    $('#range_1').ionRangeSlider({
      min     : 0,
      max     : 5000,
      from    : 1000,
      to      : 4000,
      type    : 'double',
      step    : 1,
      prefix  : '$',
      prettify: false,
      hasGrid : true
    })
    $('#range_2').ionRangeSlider()

    $('#range_5').ionRangeSlider({
      min     : 0,
      max     : 10,
      type    : 'single',
      step    : 0.1,
      postfix : ' mm',
      prettify: false,
      hasGrid : true
    })
    $('#range_6').ionRangeSlider({
      min     : -50,
      max     : 50,
      from    : 0,
      type    : 'single',
      step    : 1,
      postfix : '°',
      prettify: false,
      hasGrid : true
    })

    $('#range_4').ionRangeSlider({
      type      : 'single',
      step      : 100,
      postfix   : ' light years',
      from      : 55000,
      hideMinMax: true,
      hideFromTo: false
    })
    $('#range_3').ionRangeSlider({
      type    : 'double',
      postfix : ' miles',
      step    : 10000,
      from    : 25000000,
      to      : 35000000,
      onChange: function (obj) {
        var t = ''
        for (var prop in obj) {
          t += prop + ': ' + obj[prop] + '\r\n'
        }
        $('#result').html(t)
      },
      onLoad  : function (obj) {
        //
      }
    })
  })
</script>
