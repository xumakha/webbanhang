<!DOCTYPE html>
<html>
<head>
    <title><?php echo $this->page_title ?></title>
    <meta charset="UTF-8">
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <!-- bootstrap 3.0.2 -->
<!--    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">-->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" />
    <!-- font Awesome -->
    <link href="assets/css/font-awesome.min.css" rel="stylesheet" />
    <!-- Theme style -->
    <link href="assets/theme/theme.css" rel="stylesheet" />
    <!-- jqplot stylesheet -->
    <link href="assets/js/jqplot/jquery.jqplot.css" rel="stylesheet"/>
    <!-- wysihtml5 stylesheet -->
    <link href="assets/css/bootstrap3-wysihtml5.min.css" rel="stylesheet"/>
    <!-- Date Range Picker stylesheet -->
    <link href="assets/css/daterangepicker-bs3.css" rel="stylesheet"/>
    <!-- Full calendar stylesheet -->
    <link href="assets/css/fullcalendar/fullcalendar.css" rel="stylesheet" />
    <link href="assets/css/style.css" rel="stylesheet" />
    <!-- Google font Signika -->
    <link href='http://fonts.googleapis.com/css?family=Signika+Negative' rel='stylesheet' type='text/css'>
    <script type="text/javascript">
        window.onload = function()
        {
            timedHide(document.getElementById('autovanish'), 5);
        }

        function timedHide(element, seconds)
        {
            if (element) {
                setTimeout(function() {
                    element.style.display = 'none';
                }, seconds*1000);
            }
        }
    </script>
</head>

<body>
<?php require_once 'views/layouts/header.php'?>
<div class="lte-main-content">

    <?php if (isset($_SESSION['success'])) {?>
        <div class="alert1" id="autovanish">
            <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
            <?php
            echo $_SESSION['success'];
            unset($_SESSION['success']);
            ?>
        </div>
    <?php } ?>
    <?php if (isset($_SESSION['error'])) {?>
        <div class="alert" id="autovanish">
            <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
            <?php
            echo $_SESSION['error'];
            unset($_SESSION['error']);
            ?>
        </div>
    <?php } ?>

    <!-- /.side-bar-->
    <!-- main content -->
    <?php if (isset($this->error)) {?>
        <div class="alert" id="autovanish">
            <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
            <?php
            echo $this->error;
            ?>
        </div>
    <?php } ?>
    <div class="lte-main-container col-md-10 col-sm-9">

        <?php echo $this->content; ?>

        <!-- /.dashboard -->
    </div>

</div>
<!-- ./.lte-main-content -->
<footer>
    <?php require_once 'views/layouts/footer.php'?>
</footer>


<!-- JQuery 1.10.2 -->
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="assets/js/bootstrap.min.js" type="text/javascript"></script>
<!-- LTE Tree -->
<script src="assets/js/lteTree.js" type="text/javascript"></script>
<!-- LTE App -->
<script src="assets/js/lteApp.js" type="text/javascript"></script>
<!-- Sparklines -->
<script src="assets/js/sparklines/jquery.sparkline.min.js" type="text/javascript"></script>
<!-- bootstrap WYSIWYG -->
<script src="assets/js/wysiwyg/bootstrap3-wysihtml5.all.min.js"></script>
<!-- bootstrap Moment -->
<script src="assets/js/moment.js"></script>
<!-- bootstrap Date Range Picker -->
<script src="assets/js/daterangepicker.js"></script>
<!-- Full Calendar -->
<script src="assets/js/fullcalendar/fullcalendar.min.js" type="text/javascript"></script>
<!-- jqplot charts -->
<script src="assets/js/jqplot/jquery.jqplot.min.js" type="text/javascript"></script>
<script type="text/javascript" src="assets/js/jqplot/plugins/jqplot.dateAxisRenderer.min.js"></script>
<script type="text/javascript" src="assets/js/jqplot/plugins/jqplot.logAxisRenderer.min.js"></script>
<script type="text/javascript" src="assets/js/jqplot/plugins/jqplot.canvasTextRenderer.min.js"></script>
<script type="text/javascript" src="assets/js/jqplot/plugins/jqplot.canvasAxisTickRenderer.min.js"></script>
<script type="text/javascript" src="assets/js/jqplot/plugins/jqplot.highlighter.min.js"></script>
<script type="text/javascript" src="assets/js/jqplot/plugins/jqplot.barRenderer.min.js"></script>
<script type="text/javascript" src="assets/js/jqplot/plugins/jqplot.categoryAxisRenderer.min.js"></script>
<script type="text/javascript" src="assets/js/jqplot/plugins/jqplot.pointLabels.min.js"></script>
<script type="text/javascript">
    $(function() {
        //Full Calendar
        $('#fullcalendar').fullCalendar({
            events: [
                {
                    title: 'event1',
                    start: '2013-12-01'
                },
                {
                    title: 'event2',
                    start: '2013-12-05',
                    end: '2013-12-07'
                },
                {
                    title: 'event3',
                    start: '2013-12-09 12:30:00',
                    allDay: false // will make the time show
                }
            ]
        });

        //Line chart 1
        $.jqplot._noToImageButton = true;
        var currYear = [["2011-08-01", 796.01], ["2011-08-02", 510.5], ["2011-08-03", 527.8],
            ["2011-08-05", 420.36], ["2011-08-06", 219.47], ["2011-08-07", 333.82], ["2011-08-08", 660.55],
            ["2011-08-10", 521], ["2011-08-11", 660.68], ["2011-08-12", 928.65], ["2011-08-13", 864.26],
            ["2011-08-15", 623.86], ["2011-08-16", 1300.05], ["2011-08-17", 972.25], ["2011-08-18", 661.98],
            ["2011-08-20", 1546.23], ["2011-08-21", 593], ["2011-08-22", 560.25], ["2011-08-23", 857.8],
            ["2011-08-25", 1256.14], ["2011-08-26", 1033.01], ["2011-08-27", 811.63], ["2011-08-28", 735.01],
            ["2011-08-31", 1177], ["2011-09-01", 1023.66], ["2011-09-02", 1442.31], ["2011-09-03", 1299.24],
            ["2011-09-09", 4118.48], ["2011-09-10", 1988.11], ["2011-09-11", 1485.89], ["2011-09-12", 2681.97],
            ["2011-09-13", 1679.56], ["2011-09-14", 3538.43], ["2011-09-15", 3118.01], ["2011-09-16", 4198.97],
            ["2011-09-17", 3020.44], ["2011-09-18", 3383.45], ["2011-09-19", 2148.91], ["2011-09-20", 3058.82],
            ["2011-09-25", 2785.93], ["2011-09-26", 4329.7], ["2011-09-27", 3493.72], ["2011-09-28", 4440.55]];

        var plot1 = $.jqplot("visitors-chart", [currYear], {
            seriesColors: ["#fa3031"],
            highlighter: {
                show: true,
                sizeAdjust: 1,
                tooltipOffset: 9
            },
            grid: {
                background: 'rgba(57,57,57,0.0)',
                drawBorder: false,
                shadow: false,
                gridLineColor: '#eeeeee',
                gridLineWidth: 2
            },
            legend: {
                show: false,
                placement: 'inside'
            },
            seriesDefaults: {
                rendererOptions: {
                    smooth: true,
                    animation: {
                        show: true
                    }
                },
                showMarker: false
            },
            series: [
                {
                    fill: false,
                    label: '2012',
                    shadow: false
                }
            ],
            axesDefaults: {
                rendererOptions: {
                    baselineWidth: 1.5,
                    baselineColor: '#444444',
                    drawBaseline: false
                }
            },
            axes: {
                xaxis: {
                    renderer: $.jqplot.DateAxisRenderer,
                    tickRenderer: $.jqplot.CanvasAxisTickRenderer,
                    tickOptions: {
                        formatString: "%b %e",
                        angle: -30,
                        textColor: '#444444'
                    },
                    min: "2011-08-01",
                    max: "2011-09-30",
                    tickInterval: "7 days",
                    drawMajorGridlines: false
                },
                yaxis: {
                    renderer: $.jqplot.LogAxisRenderer,
                    pad: 0,
                    rendererOptions: {
                        minorTicks: 1
                    },
                    tickOptions: {
                        formatString: "%'d",
                        showMark: false
                    }
                }
            }
        });

        var s1 = [3200, 5633, 8921, 7842];
        var ticks = ['Jun', 'Jul', 'Aug', 'Sep'];

        var plot2 = $.jqplot('barchart', [s1], {
            // Only animate if we're not using excanvas (not in IE 7 or IE 8)..
            animate: !$.jqplot.use_excanvas,
            grid: {
                background: 'rgba(57,57,57,0.0)',
                drawBorder: false,
                shadow: false,
                gridLineColor: '#ffffff',
                gridLineWidth: 2
            },
            seriesDefaults: {
                renderer: $.jqplot.BarRenderer,
                pointLabels: {show: true},
                shadow: false,
                color: "#52b9e9"
            },
            axes: {
                xaxis: {
                    renderer: $.jqplot.CategoryAxisRenderer,
                    ticks: ticks
                },
                yaxis: {
                    show: false
                }
            },
            highlighter: {show: false}
        });
        $(window).resize(function() {
            plot1.replot({resetAxes: true});
            plot2.replot({resetAxes: true});
        });

        //wysiwyg
        $('.textarea').wysihtml5();

        //date picker
        $('#reportrange').daterangepicker(
            {
                ranges: {
                    'Today': [moment(), moment()],
                    'Yesterday': [moment().subtract('days', 1), moment().subtract('days', 1)],
                    'Last 7 Days': [moment().subtract('days', 6), moment()],
                    'Last 30 Days': [moment().subtract('days', 29), moment()],
                    'This Month': [moment().startOf('month'), moment().endOf('month')],
                    'Last Month': [moment().subtract('month', 1).startOf('month'), moment().subtract('month', 1).endOf('month')]
                },
                startDate: moment().subtract('days', 29),
                endDate: moment()
            },
            function(start, end) {
                $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
            }
        );
    });
</script>
<script src="assets/ckeditor/ckeditor.js"></script>
<script type="text/javascript">
    //Code tích hợp CKeditor vào text area qua name của thẻ textarea
    CKEDITOR.replace('content' , {
        //đường dẫn đến file ckfinder.html của ckfinder
        filebrowserBrowseUrl: 'assets/ckfinder/ckfinder.html',
        //đường dẫn đến file connector.php của ckfinder
        filebrowserUploadUrl: 'assets/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files'
    });
</script>
<script>
    var loadFile = function(event) {
        var output = document.getElementById('output');
        output.src = URL.createObjectURL(event.target.files[0]);
        output.onload = function() {
            URL.revokeObjectURL(output.src) // free memory
        }
    };
</script>
<script type="text/javascript">
    const input = document.getElementById('file-input');
    const image = document.getElementById('img-preview');

    input.addEventListener('change', (e) => {
        if (e.target.files.length) {
            const src = URL.createObjectURL(e.target.files[0]);
            image.src = src;
        }
    });
</script>
</body>
</html>
