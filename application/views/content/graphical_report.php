<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

<script type="text/javascript">
    google.charts.load('current', {
        'packages': ['corechart']
    });
    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {

        var data = google.visualization.arrayToDataTable([
            //['Platform','Reach'],
            ['Element', 'Density', {
                role: 'style'
            }],
            ['Pending Review', <?php echo json_encode($graphData['pendingReviewCount']); ?>, 'color:#ff9800; opacity: 1.3; '],
            ['Pending Creation', <?php echo json_encode($graphData['pendingCreationCount']); ?>, 'color:#9c27b0; opacity: 1.3;'],
            ['Pending Signoff', <?php echo json_encode($graphData['pendingSignoffCount']); ?>, 'color:#ff5722; opacity: 0.3;'],
            ['Signed Off', <?php echo json_encode($graphData['signedOffCount']); ?>, 'color:#4caf50; opacity: 1.3;'],
            ['Expired/Terminated', <?php echo json_encode($graphData['expiredCount']); ?>, 'color:#f50057; opacity: 1.3;']

        ]);
        
        var options = {
            title: 'CONTRACT / DOCUMENT STATUS',
            width: 600,
            height: 300,
            hAxis: {
                title: 'STATUS',
                titleTextStyle: {
                    color: 'red'
                }
            },
            colors: ['#ff9800', '#9c27b0', '#ff5722', '#4caf50'],
            backgroundColor: {
                fill: 'transparent'
            },
            //chartArea: {backgroundColor: {stroke: 'black',strokeWidth: 2}},
             is3D: true,
            //pieHole: 0.4
        };
        var chart = new google.visualization.PieChart(document.getElementById('piechart'));
        chart.draw(data, options);

        var chart2 = new google.visualization.ColumnChart(document.getElementById('histogram'));
        chart2.draw(data, options);
    }
</script>







<div class="m-content">

    <div class="row">
        <div class="col-lg-12">


            <!--begin::Portlet-->
            <div class="m-portlet">


                <div class="m-portlet__head">
                    <div class="m-portlet__head-caption">
                        <div class="m-portlet__head-title">
                            <h3 class="m-portlet__head-text">
                                Search Filter /
                                <button type="button" class="btn btn-default" id="btn_pdf">
																Print to PDF
															</button>
                            </h3>
                            
                        </div>
                    </div>
                </div>


                <!--Search Start-->

                <div class="m-portlet__body" style="background:#f1f1f1">
                    <p>
                    <div id="doc_error" style="color:red; font-weight:bold; text-align:center"><?php echo validation_errors() ?? validation_errors(); ?></div>
                    </p>

                    <form action="<?php echo site_url('app/search/graph'); ?>" method="post" accept-charset="utf-8">
                        <div class="row">
                            <div class="col-xs-12 col-sm-6 col-md-3">
                                <label>Filter By</label>
                                <select class="form-control" name="filterBy" required>
                                    <option value="">--select--</option>
                                    <option value="Date Created" <?php if ($filterBy == "Date Created") echo "selected" ?>>Date Created</option>
                                    <option value="Contract Date" <?php if ($filterBy == "Contract Date") echo "selected" ?>>Contract Date</option>


                                </select>
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-3">
                                <label class="">
                                    Start Date:
                                </label>
                                <input type="text" class="form-control m-input" id="m_datepicker_1" data-date-format="yyyy/mm/dd" placeholder="Enter Start Date" name="startDate" value="<?php echo $startDate ?? $startDate; ?>" readonly />
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-3">
                                <label class="">
                                    End Date:
                                </label>
                                <input type="text" class="form-control m-input" id="m_datepicker_2" data-date-format="yyyy/mm/dd" placeholder="Enter End Date" name="endDate" value="<?php echo $endDate ?? $endDate; ?>" readonly />
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-3">
                                <label>.</label>
                                <input type="submit" role="button" class="btn btn-default btn-block" value="Search" name="btn_search"></input>
                            </div>

                        </div>
                    </form>

                </div>
                <!--end portlet-->

                <!--Search End-->

            </div>
            <!--end::Portlet-->



        </div>
    </div>













    <div class="row">
        <div class="col-lg-6">

            <!--begin::Portlet-->
            <div class="m-portlet">


                <div class="m-portlet__head">
                    <div class="m-portlet__head-caption">
                        <div class="m-portlet__head-title">
                            <h3 class="m-portlet__head-text">
                                <?php echo count($contracts) . " record(s) returned "; ?>
                            </h3>
                        </div>
                    </div>
                </div>


                <div class="m-portlet__body">
                    <!--begin::Section-->
                    <div class="m-section">
                        <div class="m-section__content">

                            <div id="piechart" style="width: 600px; height: 250px;"></div>

                        </div>
                        <div id="piechart_print"></div>

                    </div>
                    <!--end::Section-->
                </div>
            </div>
            <!--end::Portlet-->
        </div>


        <div class="col-lg-6">

            <!--begin::Portlet-->
            <div class="m-portlet">


                <div class="m-portlet__head">
                    <div class="m-portlet__head-caption">
                        <div class="m-portlet__head-title">
                            <h3 class="m-portlet__head-text">
                                <?php echo count($contracts) . " record(s) returned "; ?>
                            </h3>
                        </div>
                    </div>
                </div>


                <div class="m-portlet__body">
                    <!--begin::Section-->
                    <div class="m-section">
                        <div class="m-section__content">
                            <div id="histogram" style="width: 600px; height: 250px;"></div>

                        </div>
                    </div>
                </div>
                <!--end::Section-->
            </div>
        </div>
        <!--end::Portlet-->
    </div>

</div>

</div>



<script type="text/javascript" src="<?php echo base_url('assets/') ?>js/plugins/jquery/jquery.min.js"></script>

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.5.3/jspdf.min.js"></script>
<script type="text/javascript" src="https://html2canvas.hertzen.com/dist/html2canvas.js"></script>

<script>
    $('#btn_pdf').click(function() {

        CreatePDFfromHTML();
    });

    function CreatePDFfromHTML() {
        var HTML_Width = $(".html-content").width();
        var HTML_Height = $(".html-content").height();
        var top_left_margin = 15;
        var PDF_Width = HTML_Width + (top_left_margin * 2);
        var PDF_Height = (PDF_Width * 1.5) + (top_left_margin * 2);
        var canvas_image_width = HTML_Width;
        var canvas_image_height = HTML_Height;

        var totalPDFPages = Math.ceil(HTML_Height / PDF_Height) - 1;

        html2canvas($(".html-content")[0]).then(function(canvas) {
            var imgData = canvas.toDataURL("image/jpeg", 1.0);
            var pdf = new jsPDF('p', 'pt', [PDF_Width, PDF_Height]);
            pdf.addImage(imgData, 'JPG', top_left_margin, top_left_margin, canvas_image_width, canvas_image_height);
            for (var i = 1; i <= totalPDFPages; i++) {
                pdf.addPage(PDF_Width, PDF_Height);
                pdf.addImage(imgData, 'JPG', top_left_margin, -(PDF_Height * i) + (top_left_margin * 4), canvas_image_width, canvas_image_height);
            }
            pdf.save("Chart_Report.pdf");
           // $(".html-content").hide();
        });
    }
</script>