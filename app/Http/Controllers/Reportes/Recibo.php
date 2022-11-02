<?php

namespace App\Http\Controllers\Reportes;

use App\Models\Atencion;
use App\Models\DetalleRecibo;
use App\Models\DetalleServicio;
use App\Models\Recibo as ModelsRecibo;
use Codedge\Fpdf\Fpdf\Fpdf;
use Illuminate\Support\Facades\Date;

class Recibo extends Fpdf
{
    protected $fpdf;
    public $margin = 30;
    public $width = 165;
    public $space = 4;
    public $vineta = 30;
    public $widths;
    public $aligns;

    public function __construct()
    {
        $this->fpdf = new Fpdf('P', 'mm', 'Letter');
    }

    public function descargar($id)
    {
        // datos
        $atencion = Atencion::find($id);
        $recibo = ModelsRecibo::where('atencion_id', $atencion->id)->first();
        $user = auth()->user();
        $detalleProductos = DetalleRecibo::where('recibo_id', $recibo->id)->get();
        $detalleServicios = DetalleServicio::where('recibo_id', $recibo->id)->get();
        $listaTotal = $detalleProductos->concat($detalleServicios);

        // iniciar el documento
        $this->fpdf->AddPage();
        $this->fpdf->SetMargins(25, $this->margin, 20);
        $this->fpdf->SetAutoPageBreak(true, 20);

        // fecha de hoy solo fecha
        $fecha = Date::now()->format('d/m/Y');

        // Encabezado
        $this->fpdf->Image('pngwing.com.png', 25, 18, 20, 20);
        $this->fpdf->Ln(15);
        $this->fpdf->SetFont('Arial', '', 10);
        $this->fpdf->MultiCell($this->width, 4, utf8_decode($fecha), 0, 'R', 0);
        $this->fpdf->MultiCell($this->width, 4, utf8_decode("Santa Cruz de la Sierra "), 0, 'R', 0);
        $this->fpdf->SetFont('Arial', 'B', 10);
        $this->fpdf->MultiCell($this->width, $this->space, utf8_decode("Veterinaria Mundo Mascotas"), 0, 'R', 0);
        $this->fpdf->Ln(20);
        $this->fpdf->SetFont('Arial', 'B', 15);
        $this->fpdf->MultiCell($this->width, $this->space, utf8_decode("Recibo"), 0, 'C', 0);

        // Cuerpo
        $this->fpdf->Ln(10);
        $this->fpdf->SetFont('Arial', '', 10);
        $this->WriteText("<Recibí de:> " . $atencion->cliente->nombre);
        $this->fpdf->Ln(5);
        $this->WriteText("<La suma de:> " . $recibo->monto_total . ' Bs');
        $this->fpdf->Ln(5);
        $this->WriteText("<Por concepto de:> Atención");
        $this->fpdf->Ln(10);

        // Table
        $this->fpdf->SetFont('Arial', 'B', 15);
        $this->fpdf->MultiCell($this->width, $this->space, utf8_decode("Lista de productos"), 0, 'C', 0);
        $this->fpdf->Ln(5);

        $this->widths = array($this->width / 6, $this->width / 6, $this->width / 6, $this->width / 6, $this->width / 6, $this->width / 6);
        $this->fpdf->SetFont('Arial', '', 10);
        $this->row(array(utf8_decode('Codigo'), utf8_decode('Nombre'), utf8_decode('Tipo'), utf8_decode('Precio'), utf8_decode('Cantidad'), utf8_decode('Subtotal')), 1);

        foreach ($listaTotal as $key => $producto) {
            $codigo = '';
            $producto->producto ? $codigo = $producto->producto->id : $codigo = $producto->servicio->id;
            $nombre = '';
            $producto->producto ? $nombre = $producto->producto->nombre : $nombre = $producto->servicio->nombre;
            $tipo = '';
            $producto->producto ? $tipo = 'Producto' : $tipo = 'Servicio';
            $precio = '';
            $producto->producto ? $precio = $producto->producto->precio : $precio = $producto->servicio->precio;
            $cantidad = '';
            $producto->producto ? $cantidad = $producto->cantidad : $cantidad = 1;
            $this->row(array(utf8_decode($codigo), utf8_decode($nombre), utf8_decode($tipo), utf8_decode($precio), utf8_decode($cantidad), utf8_decode($cantidad * $precio)), 0);
        }
        $this->row(array(utf8_decode(""), utf8_decode(""), utf8_decode(""), utf8_decode(""), utf8_decode("TOTAL"), utf8_decode($recibo->monto_total . " Bs")), 0, 'C', "S");
        // mover hasta casi el final de la hoja para el pie de pagina
        $this->fpdf->SetY(-40);

        // FONT BOLD
        $this->fpdf->MultiCell($this->width, 4, utf8_decode("_ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _"), 0, 'C', 0);
        $this->fpdf->SetFont('Arial', '', 10);
        $this->fpdf->MultiCell($this->width, 4, utf8_decode($user->name), 0, 'C', 0);
        $this->fpdf->SetFont('Arial', 'B', 10);
        $this->fpdf->MultiCell($this->width, 4, utf8_decode("Veterinaria Mundo Mascota"), 0, 'C', 0);

        $this->fpdf->Output("I", "Recibo.pdf");
    }


    function Row($data, $pintado = 0, $alling = 'L', $negrita = "N", $salto = true)
    {
        //Calculate the height of the row
        $nb = 0;
        for ($i = 0; $i < count($data); $i++)
            $nb = max($nb, $this->NbLines($this->widths[$i], $data[$i]));
        $h = 5 * $nb + 2;
        //Issue a page break first if needed
        //Draw the cells of the row
        for ($i = 0; $i < count($data); $i++) {
            $w = $this->widths[$i];
            $a = isset($this->aligns[$i]) ? $this->aligns[$i] : $alling;
            //Save the current position
            $x = $this->fpdf->GetX();
            $y = $this->fpdf->GetY();
            if ($pintado == 1) {
                $this->fpdf->setFillColor(29, 78, 216);
                if ($i == 0) {
                    $h = $h - 2;
                }
                $this->fpdf->Rect($x, $y, $w, $h, 'F');
                $this->fpdf->SetXY($x, $y + 1);
                $this->fpdf->SetTextColor(255, 255, 255);
                $this->fpdf->SetFont('Arial', 'B', 10);
            } else {
                $this->fpdf->Rect($x, $y, $w, $h);
                $this->fpdf->SetXY($x, $y + 1);
                $this->fpdf->SetFont('Arial', '', 10);
                if ($negrita == "S") {
                    $this->fpdf->SetFont('Arial', 'B', 10);
                }
            }
            $this->fpdf->MultiCell($w, $this->space, $data[$i], 0, $a, $pintado);
            //Put the position to the right of the cell
            $this->fpdf->SetXY($x + $w, $y);
            // letra color negro
            $this->fpdf->SetTextColor(0, 0, 0);
        }
        if ($salto == true) {
            $this->fpdf->Ln($h);
        }
    }

    function CheckPageBreak($h)
    {
        //If the height h would cause an overflow, add a new page immediately
        if ($this->fpdf->GetY() + $h > $this->PageBreakTrigger)
            $this->fpdf->AddPage($this->CurOrientation);
    }

    function NbLines($w, $txt)
    {
        //Computes the number of lines a MultiCell of width w will take
        $cw = &$this->fpdf->CurrentFont['cw'];
        if ($w == 0)
            $w = $this->fpdf->w - $this->fpdf->rMargin - $this->fpdfx;
        $wmax = ($w - 2 * $this->fpdf->cMargin) * 1000 / $this->fpdf->FontSize;
        $s = str_replace("\r", '', $txt);
        $nb = strlen($s);
        if ($nb > 0 and $s[$nb - 1] == "\n")
            $nb--;
        $sep = -1;
        $i = 0;
        $j = 0;
        $l = 0;
        $nl = 1;
        while ($i < $nb) {
            $c = $s[$i];
            if ($c == "\n") {
                $i++;
                $sep = -1;
                $j = $i;
                $l = 0;
                $nl++;
                continue;
            }
            if ($c == ' ')
                $sep = $i;
            $l += $cw[$c];
            if ($l > $wmax) {
                if ($sep == -1) {
                    if ($i == $j)
                        $i++;
                } else
                    $i = $sep + 1;
                $sep = -1;
                $j = $i;
                $l = 0;
                $nl++;
            } else
                $i++;
        }
        return $nl;
    }

    function WriteText($text)
    {
        $intPosIni = 0;
        $intPosFim = 0;
        if (strpos($text, '<') !== false && strpos($text, '[') !== false) {
            if (strpos($text, '<') < strpos($text, '[')) {
                $this->fpdf->Write(5, utf8_decode(substr($text, 0, strpos($text, '<'))));
                $intPosIni = strpos($text, '<');
                $intPosFim = strpos($text, '>');
                $this->fpdf->SetFont('', 'B');
                $this->fpdf->Write(5, utf8_decode(substr($text, $intPosIni + 1, $intPosFim - $intPosIni - 1)));
                $this->fpdf->SetFont('', '');
                $this->WriteText(substr($text, $intPosFim + 1, strlen($text)));
            } else {
                $this->fpdf->Write(5, utf8_decode(substr($text, 0, strpos($text, '['))));
                $intPosIni = strpos($text, '[');
                $intPosFim = strpos($text, ']');
                // $w = $this->fpdf->GetStringWidth('a') * ($intPosFim - $intPosIni - 1);
                $w = $this->width;
                $this->fpdf->Cell($w, $this->FontSize + 0.75, substr($text, $intPosIni + 1, $intPosFim - $intPosIni - 1), 1, 0, 'J');
                $this->WriteText(substr($text, $intPosFim + 1, strlen($text)));
            }
        } else {
            if (strpos($text, '<') !== false) {
                $this->fpdf->Write(5, utf8_decode(substr($text, 0, strpos($text, '<'))));
                $intPosIni = strpos($text, '<');
                $intPosFim = strpos($text, '>');
                $this->fpdf->SetFont('', 'B');
                $this->WriteText(substr($text, $intPosIni + 1, $intPosFim - $intPosIni - 1));
                $this->fpdf->SetFont('', '');
                $this->WriteText(substr($text, $intPosFim + 1, strlen($text)));
            } elseif (strpos($text, '[') !== false) {
                $this->fpdf->Write(5, utf8_decode(substr($text, 0, strpos($text, '['))));
                $intPosIni = strpos($text, '[');
                $intPosFim = strpos($text, ']');
                // $w = $this->fpdf->GetStringWidth('a') * ($intPosFim - $intPosIni - 1);
                $w = $this->width;
                $this->fpdf->Cell($w, $this->FontSize + 0.75, substr($text, $intPosIni + 1, $intPosFim - $intPosIni - 1), 1, 0, 'J');
                $this->WriteText(substr($text, $intPosFim + 1, strlen($text)));
            } else {
                $this->fpdf->Write(5, utf8_decode($text));
            }
        }
    }
}
