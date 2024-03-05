<!doctype html>
<html>
    <head>
        <title> Data Ktegori Barang</title>
    <head>
        <body>
            <h1>Data Level Pengguna</h1>
            <table border="1" cellpadding="2" cellspacing="0">
                <tr>
                    <th> ID </th>
                    <th> Kode Kategori </th>
                    <th> Nama Ktegori </th>
                </tr>
                  @foreach ($data as $d)
                  <tr>
                    <td>{{$d->kategori_id}}</td>
                    <td>{{$d->kategori_kode}}</td>
                    <td>{{$d->nama}}</td>
                </tr>
                @endforeach
            </table>
        <body>
</html>
