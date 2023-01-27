<?php header('Access-Control-Allow-Origin: *'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>E-collections</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="source/basic.css">
    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.13/css/bootstrap-multiselect.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-2.2.0.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.13/js/bootstrap-multiselect.js"></script>
</head>
<body>
<div class="header">
    <h1 style="font-family:verdana;">You can view all e-collections or make changes to the e-collection database</h1>
</div>
<div class="navbar">
    <!-- <a href="../index.html">Home</a> -->
    <a href="ecollections.php">E-collections</a>
    <a href="vendor.php">Vendor</a>
    <div class="subnav">
        <button class="subnavbtn active" onclick="location.href='973_all_search.php'">973 <i
                    class="fa fa-caret-down"></i></button>
        <div class="subnav-content">
            <a href="973/973e.php">973 E-collections</a>
            <a href="973/973p.php">973 P-collections</a>
        </div>
    </div>
</div>

<div class="tab">
    <button class="tablinks" onclick="openCity(event, 'View'); showDiv('View')">View/Edit</button>
    <button class="tablinks" onclick="openCity(event, 'Filter'); showDiv('Filter')">Filter&Export</button>
    <button class="tablinks" onclick="openCity(event, 'Add'); showDiv('Add')">Add New</button>
    <button class="tablinks" id="Almabutton" onclick="openCity(event, 'Alma'); showDiv('Alma')">Search in Alma</button>
</div>

<div id="View" class="tabcontent" style="display:block">
    <div class="form">
        <form action="ecol.php" method="post">
            <input type="text" name="valueToSearch" placeholder="Value To Search"><br><br>
            <input type="submit" name="search" value="Filter"><br><br>
            <h2>View Records</h2>
            <table width="100%" border="1" style="border-collapse:collapse;">
                <thead>
                <tr>
                    <th><strong>Collection ID</strong></th>
                    <th><strong>Collection Name</strong></th>
                    <th><strong>Resource Type</strong></th>
                    <th><strong>Bib Source</strong></th>
                    <th><strong>Update Frequency</strong></th>
                    <th><strong>Active?</strong></th>
                    <th><strong>Perpetual?</strong></th>
                    <th><strong>Aggregator?</strong></th>
                    <th><strong>Data Sync?</strong></th>
                    <th><strong>OA?</strong></th>
                    <th><strong>Reclamation?</strong></th>
                    <th><strong>Vendor</strong></th>
                    <th><strong>Note</strong></th>
                    <th><strong>Edit</strong></th>
                    <th><strong>Delete</strong></th>
                </tr>
                </thead>
                <tbody>
                <?php
                require('db.php');
                if ($_POST['valueToSearch']) {
                    $valueToSearch = $_POST['valueToSearch'];
                    $sql = "SELECT * FROM `AllEbookCollections` 
                                    WHERE CONCAT(`Collection ID`, `Collection Name`, `Resource Type`, `Bib Source`, 
                                    `Update Frequency`, `Active?`, `Perpetual?`, `Aggregator?`, `Data Sync?`, `OA?`, 
                                    `Reclamation?`, `Vendor`, `Note`) 
                                LIKE '%" . $valueToSearch . "%'";
                } else {
                    $sql = "SELECT * FROM `AllEbookCollections` Order by `Collection Name`";
                }
                $result = $conn->query($sql);
                while ($row = mysqli_fetch_assoc($result)) {
                    print '<tr>';
                    print '<td align="left">';
                    echo $row["Collection ID"];
                    print '</td>';

                    print '<td align="left">';
                    echo $row["Collection Name"];
                    print '</td>';

                    print '<td align="left">';
                    echo $row["Resource Type"];
                    print '</td>';

                    print '<td align="left">';
                    echo $row["Bib Source"];
                    print '</td>';

                    print '<td align="left">';
                    echo $row["Update Frequency"];
                    print '</td>';

                    print '<td align="left">';
                    if ($row["Active?"] == 1) {
                        echo "Y";
                    } else {
                        echo "N";
                    }
                    print '</td>';

                    print '<td align="left">';
                    if ($row["Perpetual?"] == 1) {
                        echo "Y";
                    } elseif ($row["Perpetual?"] == 2) {
                        echo "Some";
                    } else {
                        echo "N";
                    }
                    print '</td>';

                    print '<td align="left">';
                    if ($row["Aggregator?"] == 1) {
                        echo "Y";
                    } else {
                        echo "N";
                    }
                    print '</td>';

                    print '<td align="left">';
                    if ($row["Data Sync?"] == 1) {
                        echo "Y";
                    } else {
                        echo "N";
                    }
                    print '</td>';

                    print '<td align="left">';
                    if ($row["OA?"] == 1) {
                        echo "Y";
                    } else {
                        echo "N";
                    }
                    print '</td>';

                    print '<td align="left">';
                    if ($row["Reclamation?"] == 1) {
                        echo "Y";
                    } else {
                        echo "N";
                    }
                    print '</td>';

                    print '<td align="left">';
                    echo $row["Vendor"];
                    print '</td>';

                    print '<td align="left">';
                    echo $row["Note"];
                    print '</td>';

                    print '<td align="left"><a href="ecol/ecol-edit.php?id=';
                    echo $row["Collection ID"];
                    print '">Edit</a></td>';

                    print '<td align="left"><a href="ecol/ecol-delete.php?id=';
                    echo $row["Collection ID"];
                    print '">Delete</a></td>';

                    print '</tr>';
                }
                $conn->close();
                ?>
                </tbody>
            </table>
        </form>
    </div>
</div>

<div id="Filter" class="tabcontent">
</div>

<div id="Add" class="tabcontent">
    <form action="ecol/addecollection.php" method="post">
        Collection ID: <input type="number" name="ecid"><br>
        Collection Name: <input type="text" name="ecname"><br>
        Resource Type: <select multiple="multiple" name="rtype" class="selectpicker" data-live-search="true">
            <option value="book">Book</option>
            <option value="audio">Audio</option>
            <option value="streaming audio">Streaming Audio</option>
            <option value="video">Video</option>
            <option value="streaming video">Streaming Video</option>
            <option value="journal">Journal</option>
            <option value="newspaper">Newspaper</option>
            <option value="govdoc">Gov Doc</option>
            <option value="masterthesis">Master Thesis</option>
        </select><br>
        Bib Source: <select multiple="multiple" name="bib" class="selectpicker" data-live-search="true">
            <option value="vendor">Vendor</option>
            <option value="CZ">CZ</option>
            <option value="WCM">WCM</option>
            <option value="OCLC">OCLC</option>
            <option value="vendor">Vendor</option>
            <option value="?">?</option>
        </select><br>
        Update Frequency: <select name="freq">
            <option value="monthly">monthly</option>
            <option value="one time">one time</option>
            <option value="?">?</option>
        </select><br>
        Is it Active: <select name="act">
            <option value=1>Yes</option>
            <option value=0>No</option>
        </select><br>
        Is it Perpetual: <select name="perp">
            <option value=1>Yes</option>
            <option value=0>No</option>
            <option value=2>Some</option>
        </select><br>
        Is it Aggregator: <select name="agg">
            <option value=1>Yes</option>
            <option value=0>No</option>
        </select><br>
        Is it Data Synced: <select name="sync">
            <option value=1>Yes</option>
            <option value=0>No</option>
        </select><br>
        Is it OA: <select name="oa">
            <option value=1>Yes</option>
            <option value=0>No</option>
        </select><br>
        Is it Included in Reclamation: <select name="reclm">
            <option value=1>Yes</option>
            <option value=0>No</option>
        </select><br>
        Vendor: <select name="vendor">
            <?php
            require("db.php");
            echo "<option value='?'>?</option>";
            $query = "SELECT DISTINCT(`Vendor Name`) FROM `VendorList`;";
            $result = $conn->query($query);
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $acc = $row['Vendor Name'];
                    echo "<option value=\"$acc\">$acc</option>";
                }
            }
            $conn->close();
            ?>
        </select><br>
        Note: <textarea type="text" name="note"></textarea><br>
        <input type="submit">
    </form>
</div>

<div id="Alma" class="tabcontent">
    <h3>Enter the collection ID</h3>
    <input type="number" name="almaid" id ="almaid" placeholder="Collection ID"><br><br>
    <button type="submit" name="search" value="Search" onClick="almafetch();servicefetch()">Search</button>
    <button onClick="searchclear()">Clear</button>
    <div id="almareturn1">
    </div>
    <br>
    <div id="almareturn2">
    </div>

</div>

</body>

<script>
    function openCity(evt, cityName) {
        var i, tabcontent, tablinks;
        tabcontent = document.getElementsByClassName("tabcontent");
        for (i = 0; i < tabcontent.length; i++) {
            tabcontent[i].style.display = "none";
        }
        tablinks = document.getElementsByClassName("tablinks");
        for (i = 0; i < tablinks.length; i++) {
            tablinks[i].className = tablinks[i].className.replace(" active", "");
        }
        document.getElementById(cityName).style.display = "block";
        evt.currentTarget.className += " active";
    }

    function searchclear(){
        $("#almareturn1").empty();
        $("#almareturn2").empty();
        document.getElementById('Almabutton').click();
        document.getElementById('almaid').value = '';
    }

    $('select[multiple]').multiselect({
        columns: 2,
        placeholder: 'Select options',
        onChange: function (element, checked) {
            var options = $('#mySelect option:selected');
            var selected = [];
            $(options).each(function (index, brand) {
                selected.push($(this).val());
            });
        }
    });


    function almafetch(){
        var almainputid = document.getElementById("almaid").value;
        var url = "https://sddmecbcll.execute-api.us-west-2.amazonaws.com/almaws/v1/electronic/e-collections/"+ almainputid +"?apikey=l7xx2118babda48346bd8fc980afadd6cba3";

        $.ajax({
            crossOrigin: true,
            url: url,
            type: 'GET',
            dataType: 'json', // added data type
            success: function(res) {
                console.log(res);
                var name = res.public_name;

                var numport = res.portfolios.value;

                if (res.access_type.value == "current") {
                    var perp="N";
                } else{
                    var perp="Y";
                };

                if (res.type.value == "0") {
                    var aggre="N";
                } else{
                    var aggre="Y";
                };

                if (res.free.value == "0") {
                    var free="N";
                } else{
                    var free="Y";
                };

                if (res.is_local != true) {
                    var iz ="N";
                } else{
                    var iz ="Y";
                };
                if (res.proxy_enabled.value == "false") {
                    var proxy="N";
                } else{
                    var proxy = "Y";
                };

                if (res.cdi_info == {}) {
                    var cdi ="N";
                } else{
                    var cdi = "Y";
                };

                var po = res.po_line.value;

                var interface = res.interface.name;

                var internal_des = res.internal_description;

                var pub_note = res.public_note;

                var des = res.description;

                var innerhtml = '<h4>Collection Information:</h4><table style="width:100%"><tr>'+
                    '<th>Name:</th><td>' + name+ "</td></tr>" +
                    '<tr><th>ID:</th><td>'+almainputid + "</td></tr>" +
                    '<tr><th>Num of Portfolios:</th><td>'+ numport + "</td></tr>" +
                    '<tr><th>Perpetual?:</th><td>'+ perp + "</td></tr>" +
                    '<tr><th>Aggregator?:</th><td>'+ aggre + "</td></tr>" +
                    '<tr><th>OA?:</th><td>'+ free + "</td></tr>" +
                    '<tr><th>Local?:</th><td>'+ iz + "</td></tr>" +
                    '<tr><th>Proxy?:</th><td>'+ proxy + "</td></tr>" +
                    '<tr><th>CDI?:</th><td>'+ cdi + "</td></tr>" +
                    '<tr><th>PO:</th><td>'+ po + "</td></tr>" +
                    '<tr><th>Interface:</th><td>'+ interface + "</td></tr>" +
                    '<tr><th>Description:</th><td>'+ des + "</td></tr>" +
                    '<tr><th>Internal Description:</th><td>'+ internal_des + "</td></tr>" +
                    '<tr><th>Public note:</th><td>'+ pub_note + "</td></tr>"+
                    "</table>";
                document.getElementById("almareturn1").innerHTML = innerhtml;
            },
            error: function() {
                alert('Error occured');
            }

        });
    }

    function servicefetch(){
        var almainputid = document.getElementById("almaid").value;
        var urlser = "https://sddmecbcll.execute-api.us-west-2.amazonaws.com/almaws/v1/electronic/e-collections/"+ almainputid +"/e-services?apikey=l7xx2118babda48346bd8fc980afadd6cba3";
        $.ajax({
            crossOrigin: true,
            url: urlser,
            async:false,
            type: 'GET',
            dataType: 'json', // added data type
            success: function(res1) {
                console.log(res1);
                var sernum = res1.electronic_service.length;

                if (res1.electronic_service[0].activation_status.desc == 'Available') {
                    var ser1vail ="Y";
                } else{
                    var ser1vail = "N";
                };

                var ser1des = res1.electronic_service[0].public_description;
                var ser1num = res1.electronic_service[0].portfolios.value;

                var ihtml2 = '<h4>Service Information:</h4><table style="width:100%"><tr>'+
                    '<th>Num of Portfolios:</th><td>' + sernum + "</td></tr>" +
                    '<th>Service1 Available?:</th><td>' + ser1vail + "</td></tr>" +
                    '<th>Service1 Portfolios:</th><td>' + ser1num + "</td></tr>" +
                    '<th>Service1 Description:</th><td>' + ser1des + "</td></tr>";

                if (sernum > 1){

                    var ser2num = res1.electronic_service[1].portfolios.value;
                    if (res1.electronic_service[1].activation_status.desc == 'Available') {
                        var ser2vail ="Y";
                    } else{
                        var ser2vail = "N";
                    };
                    var ser2des = res1.electronic_service[1].public_description;

                    ihtml2 += '<th>Service2 Available?:</th><td>' + ser2vail + "</td></tr>" +
                        '<th>Service2 Portfolios:</th><td>' + ser2num + "</td></tr>" +
                        '<th>Service2 Description:</th><td>' + ser2des + "</td></tr>"+
                        '</table>';

                }else{
                    ihtml2 +='</table>';
                }

                document.getElementById("almareturn2").innerHTML = ihtml2 ;
            },
            error: function() {
                alert('Error occured');
            }
        })
    }

    function showDiv(divID) {
        var arr = ["View","Filter","Add", "Alma"];
        arr = arr.filter(item => item !== divID)
        for (let i = 0; i < arr.length; i++) {
            itemid = arr[i];
            document.getElementById(itemid).style.display = "none";
        }
        document.getElementById(divID).style.display = "block";
    }


</script>
</html>