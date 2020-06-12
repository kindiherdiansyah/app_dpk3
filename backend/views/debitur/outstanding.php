<?php

// use yii\helpers\Html;
// use kartik\grid\GridView;
// use yii\data\ActiveDataProvider;
// use kartik\grid\Checkbox;
// use app\models\Debitur;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\DebiturSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

// $this->title = 'Data Debitur';
// $this->params['breadcrumbs'][] = $this->title;
// $dataProvider = new ActiveDataProvider([
//     'query' => Debitur::find()->select(['lao', new \yii\db\Expression('SUM(outstanding)')])->groupBy('lao,outstanding')->all(),
   
// ]);
// $dataProvider = Debitur::find()
//     ->select(['lao', new \yii\db\Expression('SUM(outstanding)')])
//     ->groupBy('lao,outstanding')
//     ->all();

$total_outstanding = 0;
$total_lao = 0;
$total_deb = 0;
$total_deb1 = 0;
$total_realisasi = 0;
$total_tgt_pergeseran = 0;
$total_selisihjml = 0;
$total_outjml = 0;
$total_selisihpersen = 0;
$total_outpersen = 0;
$this->title = 'TARGET PENURUNAN DPK 3 PERPETUGAS';
$this->title;
?>

<h1><p align="center"><b>TARGET PENURUNAN DPK 3 PERPETUGAS </b></p></h1>
<table  class="table table-bordered table-striped ">
    <thead>
        <tr bgcolor="#3385ff" align="center">
        <th rowspan="2"><center>LAO</center></th>
        <th rowspan="2"><center>Nama Petugas</center></th>
        <th colspan="2"><center>EOM</center></th>
        <th colspan="2"><center>Target Penurunan</center></th>
        <th colspan="2"><center>Total Penurunan</center></th>
        <th colspan="2"><center>Selisih ke Target</center></th>
        <th colspan="2"><center>Pencapaian</center></th>
        </tr>
        <tr bgcolor="#3385ff">
            <th><center>DEB</center></th>
            <th><center>OUTS</center></th>
            <th><center>DEB</center></th>
            <th><center>OUTS</center></th>
            <th><center>DEB</center></th>
            <th><center>OUTS</center></th>
            <th><center>DEB</center></th>
            <th><center>OUTS</center></th>
            <th><center>DEB</center></th>
            <th><center>OUTS</center></th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($results as $team):
        $total_lao += $team['jumlah'];
        $total_deb += $team['deb'];
        $total_deb1 += $team['deb1'];
        $total_outstanding += $team['Outstanding'];
        $total_tgt_pergeseran += $team['Target'];
        $total_realisasi += $team['Total'];
        $total_selisihjml += $team['deb'] - $team['deb1'];
        $total_outjml += $team['Target'] - $team['Total'];
        $total_selisihpersen += $team['deb1'] / $team['deb'];
        $total_outpersen += $team['Total'] / $team['Target']; 
        // $total_tgt_pergeseran += $team['SUM(tgt_pergeseran)']; 
        // $total_tgt_pergeseran += $team['SUM(tgt_pergeseran)']; ?>
            <tr>
                <td><?= $team['lao'] ?></td>
                <td><?= $team['nama_ptgs'] ?></td>
                <td><?= $team['jumlah'] ?></td>
                <td><?= number_format($team['Outstanding'],0, ',', '.') ?></td>
                <td><?= $team['deb'] ?></td>
                <td><?= number_format($team['Target'],0, ',', '.') ?></td>
                <td><?= $team['deb1'] ?></td>
                <td><?= number_format($team['Total'],0, ',', '.') ?></td>
                <td><?= $team['deb'] - $team['deb1'] ?></td>
                <td><?= number_format($team['Target'] - $team['Total'],0, ',', '.') ?></td>
                <td><?= number_format($team['deb1'] / $team['deb'],2, ',', '.') ?>%</td>
                <td><?= number_format($team['Total'] / $team['Target'],2, ',', '.') ?>%</td>
                
                
                
            </tr>
        <?php endforeach; 
        ?>
    </tbody>
   
    <tr>
    <th  bgcolor="#ff944d" colspan="2"><i>TEAM</i></th>
    <th  bgcolor="#ff944d"><?=number_format($total_lao)?></th>
    <th  bgcolor="#ff944d"> <?=number_format($total_outstanding, 0, ',', '.')?></th>
    <th  bgcolor="#ff944d"><?=number_format($total_deb)?></th>
    <th  bgcolor="#ff944d"> <?=number_format($total_tgt_pergeseran, 0, ',', '.')?></th>
    <th  bgcolor="#ff944d"><?=number_format($total_deb1)?></th>
    <th  bgcolor="#ff944d"><?=number_format($total_realisasi, 0, ',', '.')?></th>
    <th  bgcolor="#ff944d"><?=($total_selisihjml)?></th>
    <th  bgcolor="#ff944d"> <?=number_format($total_outjml, 0, ',', '.')?></th>
    <th  bgcolor="#ff944d"><?=number_format($total_selisihpersen,2, ',', '.')?>%</th>
    <th  bgcolor="#ff944d"><?=number_format($total_outpersen, 2, ',', '.')?>%</th>
    </tr>
</table>



