<?php
/**
 * Easy confirm window constructor
 *
 * @author   Dmitry Shilnikov <dev at glossword dot info>
 * @version  1.3
 */
class gwConfirmWindow
{
    public $strQuestion     = "Confirm?";
    public $strFields       = "";
    public $inputFieldtype  = "hidden";
    public $tAlign          = "center";
    public $formwidth       = "400";
    public $formname        = "post";
    public $enctype         = "application/x-www-form-urlencoded";
    public $action          = "post.php";
    public $submitok        = " Yes ";
    public $submitcancel    = " No ";
    public $formbgcolor     = "#DDD";
    public $formbordercolor = "#444";
    public $formbordercolorL= "#FFF";
    public $css_align_right = 'right';
    public $css_align_left  = 'left';
    public $submitclass     = 'submitdel';

    /**
     * Constructs <input> tag
     *
     * @param    string      field type [ hidden | input ]
     * @param    string      field name
     * @param    string      name value
     */
    public function setField($fieldtype, $var, $val)
    {
        $this->strFields .= '<input type="'.$fieldtype.'" name="'.$var.'" value="'.$val.'" />';
    } // end of setField();

    /**
     * Sets question to form
     *
     * @param    string      Question text
     * @return   string      Question text
     */
    public function setQuestion($text)
    {
        $this->strQuestion=$text;
    } // end of setQuestion();

    /**
     * Constructs confirmation window
     *
     * @return   string      full html-code for form
     */
    public function Form()
    {
        $str = "";
        $str .= '<div style="text-align:center"><form name="'.$this->formname.'" action="'.$this->action.'" enctype="'.$this->enctype.'" method="post" style="margin:0">';
        $str .= '<table width="1%" border="0" cellspacing="1" cellpadding="1" style="margin:0 auto;background:'.$this->formbordercolor.'"><tr><td style="background-color:'.$this->formbordercolorL.'">';
        $str .= '<table width="'.$this->formwidth.'" border="0" cellspacing="0" cellpadding="5" style="background:'.$this->formbgcolor.'">';

        $str .= '<tr>';
        $str .= '<td align="'.$this->css_align_left.'" style="background:'.$this->formbgcolor.'">';
        $str .= $this->strQuestion;
        $str .= "</td>";
        $str .= "</tr>";

        $str .= '<tr align="center" style="background-color:'.$this->formbgcolor.'">';
        $str .= '<td>';
        $str .= '<table width="150" border="0" cellpadding="0" id="confirmboxtable"><tr align="center">';
        $str .= '<td width="50%">';
        $str .= '<input class="'.$this->submitclass.'" type="submit" value="'.$this->submitok.'" ';
        $str .= "onclick=\"document.all.confirmboxtable.style.visibility='hidden'\"/></td>";
        $str .= '<td width="50%">';
        $str .= '<input type="reset" value="'.$this->submitcancel.'" class="submitcancel" onclick="history.back(-1);document.all.confirmboxtable.style.visibility=\'hidden\';"/></td>';
        $str .= "</tr></table>";
        $str .= "</td>";
        $str .= "</tr>";
        $str .= "</table>";

        $this->setField("hidden", "isConfirm", 1);
        $str .= $this->strFields;

        $str .= "</td></tr></table>";
        $str .= "</form></div>";
        return $str;
    } // end of Form();

    /**
     * Debug helper
     *
     * @return   string  html-code only for fileds
     */
    public function FieldsOnly()
    {
        return $this->strFields;
    } // end of FieldsOnly();
} // end of class gwConfirmWindow
