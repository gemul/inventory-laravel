<?php
foreach($listTerpinjam as $item):
$delta = time() - strtotime($item->tgl_pinjam) ;
$hari = floor( $delta / (60*60*24) ) ;
$sisaDetik = $delta % (60*60*24) ;
$jam = round( $sisaDetik / (60*60) );
if($hari==0){
    $lama=$jam." Jam" ;
}else{
    $lama=$hari." Hari, ".$jam." Jam" ;
}
$debug=time()."-".strtotime($item->tgl_pinjam)."-".$delta."-".$hari;
?>
                                <tr>
                                    <td>{{ $item->nama }}</td>
                                    <td>{{ $item->barang->namabarang }}</td>
                                    <td><div data-toggle="tooltip" title="{{$item->tgl_pinjam}}">{{ substr($item->tgl_pinjam,0,10) }}</div> </td>
                                    <td>{{ $lama }}</td>
                                    <td><a href="" class="btn btn-success btn-xs">Kembali</a></td>
                                </tr>
<?php
endforeach;
?>
                                <tr>
                                    <td colspan="5">Terakhir di update : {{ date("Y-m-d H:i:s") }}</td>
                                </tr>