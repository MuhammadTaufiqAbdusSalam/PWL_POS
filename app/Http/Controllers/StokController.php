<?php

namespace App\Http\Controllers;

use App\Models\barangmodel;
use App\Models\stokmodel;
use App\Models\suppliermodel;
use App\Models\usermodel;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use Yajra\DataTables\DataTables;

class stokcontroller extends Controller
{
    public function index(){
        $breadcrumb = (object)[
            'title' => 'Daftar Stok',
            'list'=>['Home','stok']
        ];
        $page = (object)[
            'title' => 'Daftar stok yang terdaftar dalam sistem'
        ];
        $activeMenu = 'stok';
        $supplier = suppliermodel::all();
        $barang = barangmodel::all();
        $user = usermodel::all();
        return view('stok.index',['breadcrumb'=>$breadcrumb,'page'=>$page,'activeMenu'=>$activeMenu,'supplier'=>$supplier,'barang'=>$barang,'user'=>$user]);
    }

    public function list(Request $request){
        $stok = stokmodel::select('stok_id','supplier_id','barang_id','user_id','stok_tanggal','stok_jumlah')
        ->with(['supplier','barang','user']);

        if($request->supplier_id){
            $stok->where('supplier_id',$request->supplier_id);
        }elseif($request->barang_id){
            $stok->where('barang_id',$request->barang_id);
        }elseif($request->user_id){
            $stok->where('user_id',$request->user_id);
        }

        return DataTables::of($stok)
            // menambahkan kolom index / no urut (default nama kolom: DT_RowIndex)
            ->addIndexColumn()
            ->addColumn('aksi', function ($stok) { // menambahkan kolom aksi
                // $btn = '<a href="' . url('/stok/' . $stok->stok_id) . '" class="btn btn-info btnsm">Detail</a> ';
                // $btn .= '<a href="' . url('/stok/' . $stok->stok_id . '/edit') . '" class="btn btn-warning btn-sm">Edit</a> ';
                // $btn .= '<form class="d-inline-block" method="POST" action="' . url('/stok/' . $stok->stok_id) . '">'
                //     . csrf_field() . method_field('DELETE') .
                //     '<button type="submit" class="btn btn-danger btn-sm" onclick="return confirm(\'Apakah Anda yakin menghapus data ini?\');">Hapus</button></form>';
                // return $btn;
                $btn  = '<button onclick="modalAction(\'' . url('/stok/' . $stok->stok_id .
                    '/show_ajax') . '\')" class="btn btn-info btn-sm">Detail</button> ';
                $btn .= '<button onclick="modalAction(\'' . url('/stok/' . $stok->stok_id .
                    '/edit_ajax') . '\')" class="btn btn-warning btn-sm">Edit</button> ';
                $btn .= '<button onclick="modalAction(\'' . url('/stok/' . $stok->stok_id .
                    '/delete_ajax') . '\')"  class="btn btn-danger btn-sm">Hapus</button> ';
                return $btn;
            })
            ->rawColumns(['aksi']) // memberitahu bahwa kolom aksi adalah html
            ->make(true);
    }

    public function create(){
        $breadcrumb = (object)[
            'title'=>'Tambah barang',
            'list'=>['Home','stok','tambah']
        ];
        $page = (object)[
            'title'=>'Tambah barang baru'
        ];
        $supplier = suppliermodel::all();
        $barang = barangmodel::all();
        $user = usermodel::all();
        $activeMenu ='stok';
        return view('stok.create',['breadcrumb'=>$breadcrumb,'page'=>$page,'supplier'=>$supplier,'barang'=>$barang,'user'=>$user,'activeMenu'=>$activeMenu]);
    }

    public function store(Request $request){
        $request->validate([
            'supplier_id'=>'required|integer',
            'barang_id'=>'required|integer',
            'user_id'=>'required|integer',
            'stok_tanggal'=>'required|date',
            'stok_jumlah'=>'required|integer'
        ]);

        stokmodel::create([
            'supplier_id'=>$request->supplier_id,
            'barang_id'=>$request->barang_id,
            'user_id'=>$request->user_id,
            'stok_tanggal'=>$request->stok_tanggal,
            'stok_jumlah'=>$request->stok_jumlah
        ]);

        return redirect('/stok')->with('success','Data stok berhasil disimpan');
    }

    public function show(string $stok_id){
        $stok = stokmodel::with('supplier','barang','user')->find($stok_id);
        $breadcrumb = (object)[
            'title'=>'Detail Stok',
            'list'=>['Home','stok','detail']
        ];
        $page = (object)[
            'title'=>'Detail data stok'
        ];
        $activeMenu = 'stok';
        return view('stok.show',['breadcrumb'=>$breadcrumb,'page'=>$page,'stok'=>$stok,'activeMenu'=>$activeMenu]);
    }

    public function edit(string $stok_id){
        $stok = stokmodel::find($stok_id);
        $supplier = suppliermodel::all();
        $barang = barangmodel::all();
        $user = usermodel::all();

        $breadcrumb = (object)[
            'title'=>'Edit data stok',
            'list'=>['Home','stok','edit']
        ];
        $page =(object)[
            'title'=>'Edit data stok'
        ];
        $activeMenu = 'stok';
        return view('stok.edit',['breadcrumb'=>$breadcrumb,'page'=>$page,'activeMenu'=>$activeMenu,'stok'=>$stok,'supplier'=>$supplier,'barang'=>$barang,'user'=>$user]);
    }

    public function update(Request $request, string $stok_id){
        $request->validate([
            'supplier_id'=>'required|integer',
            'barang_id'=>'required|integer',
            'user_id'=>'required|integer',
            'stok_tanggal'=>'required|date',
            'stok_jumlah'=>'required|integer'
        ]);

        $stok = stokmodel::find($stok_id);
        $stok->update([
            'supplier_id'=>$request->supplier_id,
            'barang_id'=>$request->barang_id,
            'user_id'=>$request->user_id,
            'stok_tanggal'=>$request->stok_tanggal,
            'stok_jumlah'=>$request->stok_jumlah
        ]);
        return redirect('/stok')->with('success','Data stok berhasil diubah');
    }

    public function destroy(string $stok_id){
        $check = stokmodel::find($stok_id);
        if(!$check){
            return redirect('/stok')->with('error','Data stok tidak ditemukan');
        }

        try{
            stokmodel::destroy($stok_id);
            return redirect('/stok')->with('success', 'Data stok berhasil dihapus');
        } catch (\Illuminate\Database\QueryException $e){
            return redirect('/stok')->with('error','Data stok gagal dihapus karena masih terdapat tabel lain yang terkait dengan data ini');
        }
    }

    public function create_ajax()
    {
        $supplier = suppliermodel::all();
        $barang = barangmodel::all();
        $user = usermodel::all();
        $stok = stokmodel::all();
        return view('stok.create_ajax', ['supplier' => $supplier,'barang'=>$barang,'user'=>$user,'stok'=>$stok]);
    }

    public function store_ajax(Request $request){
        if ($request->ajax() || $request->wantsJson()){
            $rules = [
                'supplier_id'=>'required|integer',
                'barang_id'=>'required|integer',
                'user_id'=>'required|integer',
                'stok_tanggal'=>'required|date',
                'stok_jumlah'=>'required|integer'
            ];
            $validator = Validator::make($request->all(),$rules);
            if($validator->fails()){
                return response()->json([
                    'status' => false,
                    'message' => 'Validasi Gagal',
                    'msgField' => $validator->errors(),
                ]);
            }

            stokmodel::create($request->all());
            return response()->json([
                'status' => true,
                'message' => 'Data stok berhasil disimpan'
            ]);
        }
        redirect('/');
    }
    public function edit_ajax(string $stok_id){
        $supplier = suppliermodel::select('supplier_id','supplier_nama')->get();
        $stok = stokmodel::find($stok_id);
        $barang = barangmodel::select('barang_id','barang_nama')->get();
        $user = usermodel::select('user_id','username')->get();

        return view('stok.edit_ajax',['supplier'=>$supplier,'stok'=>$stok,'barang'=>$barang,'user'=>$user]);
    }

    public function update_ajax(Request $request, $stok_id){
        if($request->ajax() || $request->wantsJson()){
            $rules = [
                'supplier_id'=>'required|integer',
                'barang_id'=>'required|integer',
                'user_id'=>'required|integer',
                'stok_tanggal'=>'required|date',
                'stok_jumlah'=>'required|integer'
            ];
            $validator = Validator::make($request->all(),$rules);
            if($validator->fails()){
                return response()->json([
                    'status'   => false,    // respon json, true: berhasil, false: gagal
                    'message'  => 'Validasi gagal.',
                    'msgField' => $validator->errors()
                ]);
            }
            $check = stokmodel::find($stok_id);
            if($check){
                $check->update($request->all());
                return response()->json([
                    'status'  => true,
                    'message' => 'Data berhasil diupdate'
                ]);
            } else {
                return response()->json([
                    'status'  => false,
                    'message' => 'Data tidak ditemukan'
                ]);
            }
        }
        return redirect('/');
    }

    public function confirm_ajax(string $stok_id) {
        $supplier = suppliermodel::all();
        $barang = barangmodel::all();
        $user = barangmodel::all();
        $stok = stokmodel::find($stok_id);
    
        // Use the correct view name
        return view('stok.confirm_ajax', [
            'supplier' => $supplier,
            'stok' => $stok,
            'barang' => $barang,
            'user' => $user,
        ]);
    }
    

    public function delete_ajax(Request $request, $stok_id)
    {
        if ($request->ajax() || $request->wantsJson()) {
            $user = stokmodel::find($stok_id);

            if ($user) {
                try {
                    $user->delete();
                    return response()->json([
                        'status' => true,
                        'message' => 'Data berhasil dihapus'
                    ]);
                } catch (\Illuminate\Database\QueryException $e) {
                    return response()->json([
                        'status' => false,
                        'message' => 'Data gagal dihapus karena masih terdapat tabel lain yang terkait dengan data ini'
                    ]);
                }
            } else {
                return response()->json([
                    'status' => false,
                    'message' => 'Data tidak ditemukan'
                ]);
            }
        }

        return redirect('/');
    }

    public function show_ajax(string $stok_id){
        $supplier = suppliermodel::all();
        $barang = barangmodel::all();
        $user = barangmodel::all();
        $stok = stokmodel::find($stok_id);
        return view('stok.show_ajax', ['supplier' => $supplier, 'stok' => $stok,'barang'=>$barang,'user'=>$user],);
    }

    public function import(){
        return view('stok.import');
    }

    public function import_ajax(Request $request) {
        if ($request->ajax() || $request->wantsJson()) {
            $rules = [
                'file_stok' => ['required', 'mimes:xlsx', 'max:1024'] // Validasi file
            ];

            $validator = Validator::make($request->all(), $rules);
            if ($validator->fails()) {
                return response()->json([
                    'status' => false,
                    'message' => 'Validasi gagal',
                    'msgField' => $validator->errors()
                ]);
            }

            $file = $request->file('file_stok'); // Mengambil file dari request
            $reader = IOFactory::createReader('Xlsx'); // Load Excel reader
            $reader->setReadDataOnly(true); // Hanya membaca data
            $spreadsheet = $reader->load($file->getRealPath()); // Load file Excel
            $sheet = $spreadsheet->getActiveSheet(); // Ambil sheet aktif

            $data = $sheet->toArray(null, false, true, true); // Ubah data sheet menjadi array

            $insert = [];
            if (count($data) > 1) {
                foreach ($data as $baris => $value) {
                    if ($baris > 1) {
                        $stok_tanggal = \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($value['D'])->format('Y-m-d H:i:s');

                        $insert[] = [
                            'supplier_id' => $value['A'],
                            'barang_id' => $value['B'],
                            'user_id' => $value['C'],
                            'stok_tanggal' => $stok_tanggal, // Menggunakan tanggal dari Excel
                            'stok_jumlah' => $value['E'],
                            'created_at' => now(),
                        ];
                    }
                }

                if (count($insert) > 0) {
                    // Masukkan data ke database, abaikan jika data sudah ada
                    stokmodel::insertOrIgnore($insert);
                }

                return response()->json([
                    'status' => true,
                    'message' => 'Data berhasil diimport'
                ]);
            } else {
                return response()->json([
                    'status' => false,
                    'message' => 'Tidak ada data yang diimport'
                ]);
            }
        }
        return redirect('/');
    }


    public function export_excel()
    {
        $stok = stokmodel::select('supplier_id', 'barang_id', 'user_id', 'stok_tanggal', 'stok_jumlah')
            ->orderBy('supplier_id')
            ->with('supplier','barang','user')
            ->get();

        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet(); //ambil sheet yang aktif

        // Set Header Kolom
        $sheet->setCellValue('A1', 'No');
        $sheet->setCellValue('B1', 'Nama Supplier');
        $sheet->setCellValue('C1', 'Nama Barang');
        $sheet->setCellValue('D1', 'Nama User');
        $sheet->setCellValue('E1', 'Stok Tanggal');
        $sheet->setCellValue('F1', 'Stok Jumlah');

        // Buat header menjadi bold
        $sheet->getStyle('A1:F1')->getFont()->setBold(true);

        $no = 1; // Nomor data dimulai dari 1
        $baris = 2; // Baris data dimulai dari baris ke-2
        foreach ($stok as $key => $value) {
            $sheet->setCellValue('A' . $baris, $no);
            $sheet->setCellValue('B' . $baris, $value->supplier->supplier_nama);
            $sheet->setCellValue('C' . $baris, $value->barang->barang_nama);
            $sheet->setCellValue('D' . $baris, $value->user->nama);
            $sheet->setCellValue('E' . $baris, $value->stok_tanggal);
            $sheet->setCellValue('F' . $baris, $value->stok_jumlah);

            $baris++;
            $no++;
        }

        // Set ukuran kolom otomatis untuk semua kolom
        foreach (range('A', 'F') as $columnID) {
            $sheet->getColumnDimension($columnID)->setAutoSize(true);
        }

        // Set judul sheet
        $sheet->setTitle('Data Stok');

        // Buat writer
        $writer = IOFactory::createWriter($spreadsheet, 'Xlsx');
        $filename = 'Data Stok ' . date('Y-m-d H:i:s') . '.xlsx';

        // Atur Header untuk Download File Excel
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="' . $filename . '"');
        header('Cache-Control: max-age=0');
        header('Cache-Control: max-age=1');
        header('Expires: Mon, 26 Jul 1997 05:00:00 GMT');
        header('Last-Modified: ' . gmdate('D, d M Y H:i:s') . ' GMT');
        header('Cache-Control: cache, must-revalidate');
        header('Pragma: public');

        // Simpan file dan kirim ke output
        $writer->save('php://output');
        exit;
    }

    public function export_pdf(){
        $stok = stokmodel::select('supplier_id','barang_id','user_id','stok_tanggal','stok_jumlah')
        ->orderBy('supplier_id')
        ->orderBy('user_id')
        ->with('supplier','user')->get();

        $pdf = Pdf::loadView('stok.export_pdf',['stok'=>$stok]);
        $pdf->setPaper('a4','portrait'); //set ukuran kertas dan orientasi
        $pdf->setOption("isRemoteEnabled", true); //set true jika ada gambar
        $pdf->render();

        return $pdf->stream('Data Stok '.date('Y-m-d H:i:s'). '.pdf');
    }
}