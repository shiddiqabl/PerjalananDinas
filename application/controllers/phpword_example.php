<?php if (!defined('BASEPATH')) exit ('No direct script access allowed');
class phpword_example extends CI_Controller {
    function __construct() {
        parent::__construct();
        $this->load->library('word');
    }
    function index() {
		
        $PHPWord = $this->word; // New Word Document
        $section = $PHPWord->createSection(); // New portrait section
        //Add Header
        $header = $section->createHeader();
        //Add Paragraph and Font Style        
        $PHPWord->addParagraphStyle('pStyleHeader', array('align'=>'center', 'spaceAfter'=>50));
        $PHPWord->addParagraphStyle('pStyleHeader2', array('align'=>'center', 'spaceAfter'=>10));
        $PHPWord->addParagraphStyle('pStyleHeader3', array('align'=>'center', 'spaceAfter'=>20));
        $PHPWord->addParagraphStyle('pStyleSection1', array('align'=>'left', 'spaceAfter'=>20));
        $PHPWord->addFontStyle('rStyleHeader1', array('name'=>'Times New Roman', 'size'=>12));
        $PHPWord->addFontStyle('rStyleHeader2', array('name'=>'Times New Roman', 'size'=>14));
        $PHPWord->addFontStyle('rStyleHeader3', array('name'=>'Times New Roman', 'size'=>11));
        $PHPWord->addFontStyle('rStyleHeader4', array('name'=>'Times New Roman', 'size'=>12, 'bold'=>'true', 'underline'=>'thick'));
        $PHPWord->addFontStyle('rStyleHeader5', array('name'=>'Times New Roman', 'size'=>12, 'bold'=>'true'));
        //Add Header Text        
        /*$header->addImage(APPPATH.'/views/templates/logo_sragen_BW.jpg', array('width'=>100,
        		'height'=>100, 'wrappingStyle'=>'behind'));*/
        $header->addText('PEMERINTAH DAERAH KAB SRAGEN', 'rStyleHeader1', 'pStyleHeader2');        
        $header->addText('DINAS KOMUNIKASI DAN INFORMATIKA', 'rStyleHeader2', 'pStyleHeader2');        
        $header->addText('Jalan Raya Sukowati No.255 Telp. (0271) 894001', 'rStyleHeader3', 'pStyleHeader');
        $header->addText('Fax. (0271) 891297 website:                                           email : kominfo@sragenkab.go.id', 
        		'rStyleHeader3', 'pStyleHeader2');              
        $header->addText('S R A G E N - 5 7 2 1 1', 'rStyleHeader1', 'pStyleHeader3');
        //Add Paragraph and Font Style for section       
        
        // Add text elements in section       
        $section->addTextBreak(1);
        $section->addText('                                                                                                                    Lembar Ke  :', 'rStyleHeader1', 'pStyleSection1');
        $section->addText('                                                                                                                    Kode No     :', 'rStyleHeader1', 'pStyleSection1');
        $section->addText('                                                                                                                    Nomor        :', 'rStyleHeader1', 'pStyleSection1');        
        $section->addText('SURAT PERINTAH PERJALANAN DINAS', 'rStyleHeader4', 'pStyleHeader3');
        $section->addText('(S P P D)', 'rStyleHeader5', 'pStyleHeader3');
        
        //Create Table Style
        //$styleTable = array('borderSize'=>6, 'borderTopColor'=>'000000', 'borderLeftColor'=>'FFFFFF', 'borderRightColor'=>'FFFFFF', 'borderBottomColor'=>'000000');
        $styleTable = array('borderSize'=>6,  'borderTopColor'=>'000000', 'borderLeftColor'=>'FFFFFF', 'borderRightColor'=>'FFFFFF', 'borderBottomColor'=>'000000', 'cellMargin'=>50);
        
        $styleCell00 = array('borderSize'=>6, 'borderBottomColor'=>'FFFFFF', 'borderRightColor'=>'FFFFFF');        
        $styleCell0 = array('borderSize'=>6, 'borderBottomColor'=>'FFFFFF', 'borderLeftColor'=>'FFFFFF');
        $styleCell1 = array('valign' => 'left');
        $styleCell2 = array('borderSize'=>6,  'borderTopColor'=>'FFFFFF', 'borderLeftColor'=>'FFFFFF', 'borderRightColor'=>'000000', 'borderBottomColor'=>'FFFFFF', 'cellMargin'=>50);
        $styleCell3 = array('borderSize'=>6,  'borderTopColor'=>'FFFFFF', 'borderLeftColor'=>'000000', 'borderRightColor'=>'FFFFFF', 'borderBottomColor'=>'FFFFFF', 'cellMargin'=>50);
        $styleCell4 = array('borderSize'=>6, 'borderTopColor'=>'FFFFFF', 'borderLeftColor'=>'FFFFFF', 'borderRightColor'=>'000000', 'borderBottomColor'=>'000000', 'cellMargin'=>50);
        $styleCell5 = array('borderSize'=>6, 'borderTopColor'=>'FFFFFF', 'borderLeftColor'=>'000000', 'borderRightColor'=>'FFFFFF', 'borderBottomColor'=>'000000', 'cellMargin'=>50);
        
        //Add Table 
        $PHPWord->addTableStyle('myTable', $styleTable);
        $table = $section->addTable('myTable');
        $table->addRow(300);
        $table->addCell(6000, '$styleCell1')->addText('1. Pejabat yang memberi perintah', 'rStyleHeader1');
        $table->addCell(6000, '$styleCell1')->addText('Kepala Dinas Komunikasi dan Informatika', 'rStyleHeader1');
        $table->addRow(300);
        $table->addCell(6000, '$styleCell1')->addText('2. Nama pegawai yang diperintah', 'rStyleHeader1');
        $table->addCell(6000, '$styleCell1')->addText('Shiddiq Abdilah Masyani', 'rStyleHeader1');
        $table->addRow(300);
        $table->addCell(6000, $styleCell0)->addText('3. a. Pangkat dan Golongan Menurut PP No. 6 Tahun 1997', 'rStyleHeader1');
        $table->addCell(6000, $styleCell00)->addText('Penata - III/C', 'rStyleHeader1');
        $table->addRow(300);
        $table->addCell(6000, $styleCell2)->addText('   b. Jabatan', 'rStyleHeader1');
        $table->addCell(6000, $styleCell3)->addText('Kasi Pengembangan Sistem Informasi Dinas Kominfo Kab. Sragen', 'rStyleHeader1');
        $table->addRow(300);
        $table->addCell(6000, $styleCell4)->addText('   c. Tingkat menurut peraturan perjalanan', 'rStyleHeader1');
        $table->addCell(6000, $styleCell5)->addText('Perjalanan Dinas Luar Daerah', 'rStyleHeader1');
        $table->addRow(300);
        $table->addCell(6000, '$styleCell1')->addText('4. Maksud Perjalanan Dinas', 'rStyleHeader1');
        $table->addCell(6000, '$styleCell1')->addText('Asistensi Implementasi Perijinan Online di Kabupaten Merauke', 'rStyleHeader1');
        $table->addRow(300);
        $table->addCell(6000, '$styleCell1')->addText('5. Alat angkut yang dipergunakan', 'rStyleHeader1');
        $table->addCell(6000, '$styleCell1')->addText('Pesawat Terbang', 'rStyleHeader1');
        $table->addRow(300);
        $table->addCell(6000, '$styleCell1')->addText('5. Alat angkut yang dipergunakan', 'rStyleHeader1');
        $table->addCell(6000, '$styleCell1')->addText('Pesawat Terbang', 'rStyleHeader1');
        $table->addRow(300);
        $table->addCell(6000, $styleCell0)->addText('6. a.Tempat Berangkat', 'rStyleHeader1');
        $table->addCell(6000, $styleCell00)->addText('Sragen', 'rStyleHeader1');
        $table->addRow(300);
        $table->addCell(6000, $styleCell4)->addText('   b. Tempat Tujuan', 'rStyleHeader1');
        $table->addCell(6000, $styleCell5)->addText('Kabupaten Merauke', 'rStyleHeader1');
        $table->addRow(300);
        $table->addCell(6000, $styleCell0)->addText('7. a. Lamanya Perjalanan Dinas', 'rStyleHeader1');
        $table->addCell(6000, $styleCell00)->addText('5 hari', 'rStyleHeader1');
        $table->addRow(300);
        $table->addCell(6000, $styleCell2)->addText('  b. Tanggal berangkat', 'rStyleHeader1');
        $table->addCell(6000, $styleCell3)->addText('06-11-2017', 'rStyleHeader1');
        $table->addRow(300);
        $table->addCell(6000, $styleCell4)->addText('  c. Tanggal harus kembali', 'rStyleHeader1');
        $table->addCell(6000, $styleCell5)->addText('10-11-2017', 'rStyleHeader1');
        $table->addRow(300);
        $table->addCell(6000, '$styleCell1')->addText('8. Pengikut', 'rStyleHeader1');
        $table->addCell(6000, '$styleCell1')->addText('', 'rStyleHeader1');
        $table->addRow(300);
        $table->addCell(6000, $styleCell0)->addText('9. Pembebanan Anggaran', 'rStyleHeader1');
        $table->addCell(6000, $styleCell00)->addText('', 'rStyleHeader1');
        $table->addRow(300);
        $table->addCell(6000, $styleCell2)->addText('   a. Instansi', 'rStyleHeader1');
        $table->addCell(6000, $styleCell3)->addText('Pesawat Terbang', 'rStyleHeader1');
        $table->addRow(300);
        $table->addCell(6000, $styleCell4)->addText('   b. Mata anggaran', 'rStyleHeader1');
        $table->addCell(6000, $styleCell5)->addText('', 'rStyleHeader1');
        $table->addRow(300);
        $table->addCell(6000, '$styleCell1')->addText('Keterangan Lain-lain', 'rStyleHeader1');
        $table->addCell(6000, '$styleCell1')->addText('', 'rStyleHeader1');
        
        //Add Text 
        $section->addTextBreak(1);
        $section->addText('                                                                                                              Dikeluarkan di  :', 'rStyleHeader1', 'pStyleSection1');
        $section->addText('                                                                                                              Pada Tanggal   :', 'rStyleHeader1', 'pStyleSection1');        
        $section->addText('                                                                                                (Pejabat yang mengeluarkan)', 'rStyleHeader1', 'pStyleSection1');
        $section->addTextBreak(2);
        $section->addText('                                                                                             (Nama pejabat yang mengeluarkan)', 'rStyleHeader1', 'pStyleSection1');        
       
        $filename='phpword_example.docx'; //save our document as this file name
        header('Content-Type: application/vnd.openxmlformats-officedocument.wordprocessingml.document'); //mime type
        header('Content-Disposition: attachment;filename="'.$filename.'"'); //tell browser what's the file name
        header('Cache-Control: max-age=0'); //no cache
        $objWriter = PHPWord_IOFactory::createWriter($PHPWord, 'Word2007');
        $objWriter->save('php://output');
    }
}
?>