<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>SAAF Per Country</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <style>
    @page { margin: 120px 25px; }
    header { position: fixed; top: -90px; left: 0px; right: 0px;  height: 60px;}
    footer { position: fixed; bottom: -60px; left: 0px; right: 0px; background-color: lightblue; height: 50px; }
    article.page { page-break-after: always; }
    article.page:last-child { page-break-after: never; }
    .header-sections {
      float: left;
      display: block;
    }
    .header-banner {
      position: absolute;
      width: 100%;
      top: 0;
      left: 0;
    }
    table {
      width: 100%;
      border-spacing: 0;
      font-size: 12px;
    }

    table th{
      text-align: center;
      border: 1px solid #ccc;
    }

    table td {
      border: 1px solid #ccc;
      padding: 5px;
      vertical-align: top;
    }
    
  </style>
</head>
<body>
    <header>
      <section class="header-sections header-banner">
        <img src="<?php echo asset('img/logo.png'); ?>" width="120px"/>
      </section>

      <section class="header-sections">
        <center>
          <h3>
            Directory of <?php echo $type; ?> from <?php echo $country->countryName; ?><br/>
            (As of <?php echo date('F'); ?> <?php echo date('Y'); ?> )
          </h3>
        </center>
      </section>
    </header>

    <main>
      <article class="page">
        <table>
          <tr>
            <th style="width: 60px;border: none;">&nbsp;</th>
            <th>Name</th>
            <th>Education</th>
            <th>Position Title/Address</th>
            <th>Specialization</th>
          </tr>

          <?php foreach($data['data'] as $key => $val): ?>
            <tr>
              <td><?php echo $key+1; ?></td>
              <td>
                <p><b><?php echo $val->firstname; ?> <?php echo $val->middleinit; ?> <?php echo $val->lastname; ?></b></p>
              </td>
              <td style="width: 210px;">
                  <!-- eucational bg -->
                  <?php foreach($val->education as $keyEd=> $valEd): ?>
                  <p><b><?php echo $valEd->institution; ?></b><br/>
                  <?php echo $valEd->field; ?></b><br/>
                  <?php echo $valEd->grad; ?><br/>
                  <i><?php echo $valEd->scholarship; ?></i>
                  </p>
                   
                  <?php endforeach; ?>
              </td>
              <td>
                  <!-- employment -->
                  <?php foreach($val->employment as $keyEmp => $valEmp): ?>
                    <p><b><?php echo $valEmp->companyName; ?></b></p>
                    <p><b>Address:</b> <?php echo $valEmp->companyAddress; ?></p>
                    <p> <b>From :</b><?php echo $valEmp->employedFrom ? $valEmp->employedFrom : 'N/A'; ?><br/>
                      <b>To :</b><?php echo $valEmp->employedTo ? $valEmp->employedTo : 'N/A';?></p><br/>
                  <?php endforeach; ?>
              </td>
              <td>
              <?php echo $val->specialization; ?></td>
            </tr>
          <?php endforeach; ?>
        </table>
      </article>
    </main>

</body>
</html>