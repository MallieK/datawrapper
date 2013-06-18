<?php 

class DatawrapperPlugin_VisualizationLineChart extends DatawrapperPlugin_Visualization {
    public function getMeta(){
        $meta = array(
            "title" => __("Line Chart", $this->getName()),
            "id" => "line-chart",
            "version" => "1.3.1",
            "extends" => "raphael-chart",
            "dimensions" => 2,
            "order" => 40,
            "options" => $this->getOptions()
        );
        return $meta;
    }
    public function getOptions(){
        $id = $this->getName();
        $options = array(
            "direct-labeling" => array(
                "type" => "checkbox",
                "label" => __("Direct labeling", $id),
                "default" => false,
                "depends-on" => array(
                    "chart.min_series_num" => 2
                )
            ),
            "legend-position" => array(
                "type" => "radio",
                "label" => __("Legend position", $id),
                "default" => "right",
                "depends-on" => array(
                    "direct-labeling" => false,
                    "chart.min_series_num" => 2
                ),
                "options" => array(
                    array(
                        "value" => "right",
                        "label" => __("right", $id)
                    ),
                    array(
                        "value" => "top",
                        "label" => __("top", $id),
                    ),
                    array(
                        "value" => "inside",
                        "label" => __("inside", $id),
                    )
                )
            ),
            "fill-between" => array(
                "type" => "checkbox",
                "label" => __("Fill between lines", $id),
                "default" => false,
                "depends-on" => array(
                    "chart.min_series_num" => 2,
                    "chart.max_series_num" => 2
                )
            ),
            "smooth-lines" => array(
                "type" => "checkbox",
                "label" => __("Smooth lines", $id),
                "default" => false,
                "expert" => false
            ),
            "rotate-x-labels" => array(
                "type" => "checkbox",
                "label" => __("Rotate labels 45 degrees", $id),
                "default" => false
            ),
            "baseline-zero" => array(
                "type" => "checkbox",
                "label" => __("Force a baseline at zero", $id),
            ),
            "connect-missing-values" => array(
                "type" => "checkbox",
                "label" => __("Connect lines between missing values", $id),
                "label" => _("Force a baseline at zero"),
            ),
            "extend-range" => array(
                "type" => "checkbox",
                "label" => __("Extend y-range to nice axis ticks", $id)
            ),
            "force-banking" => array(
                "type" => "checkbox",
                "hidden" => true,
                "label" => __("Bank the lines to 45 degrees", $id)
            ),
            "show-grid" => array(
                "type" => "checkbox",
                "hidden" => true,
                "label" => __("Show grid", $id),
                "default" => false
            )
        );
        return $options;
    }
    public function getDemoDataSets(){
        $datasets = array();
        $datasets[] = array(
            'id' => 'youth-unemployment',
            'title' => __('Youth Unemployment in Europe'),
            'type' => __('Line chart'),
            'presets' => array(
                'type' => 'line-chart',
                'metadata.describe.source-name' => 'Eurostat',
                'metadata.describe.source-url' => 'http://appsso.eurostat.ec.europa.eu/nui/show.do?query=BOOKMARK_DS-055624_QID_91D6DBE_UID_-3F171EB0&layout=TIME,C,X,0;GEO,L,Y,0;S_ADJ,L,Z,0;AGE,L,Z,1;SEX,L,Z,2;INDICATORS,C,Z,3;&zSelection=DS-055624AGE,Y_LT25;DS-055624SEX,T;DS-055624S_ADJ,SA;DS-055624INDICATORS,OBS_FLAG;&rankName1=SEX_1_2_-1_2&rankName2=AGE_1_2_-1_2&rankName3=TIME_1_0_0_0&rankName4=S-ADJ_1_2_-1_2&rankName5=INDICATORS_1_2_-1_2&rankName6=GEO_1_2_0_1&sortR=ASC_361_FIRST&pprRK=FIRST&pprSO=PROTOCOL&ppcRK=FIRST&ppcSO=ASC&sortC=ASC_-1_FIRST&rStp=&cStp=&rDCh=&cDCh=&rDM=true&cDM=true&footnes=false&empty=false&wai=false&time_mode=NONE&lang=EN&cfo=%23%23%23%2C%23%23%23.%23%23%23',
                'metadata.data.vertical-header' => true,
                'metadata.data.transpose' => true
            ),
            'data' => "GEO/TIME\t1983M01\t1983M02\t1983M03\t1983M04\t1983M05\t1983M06\t1983M07\t1983M08\t1983M09\t1983M10\t1983M11\t1983M12\t1984M01\t1984M02\t1984M03\t1984M04\t1984M05\t1984M06\t1984M07\t1984M08\t1984M09\t1984M10\t1984M11\t1984M12\t1985M01\t1985M02\t1985M03\t1985M04\t1985M05\t1985M06\t1985M07\t1985M08\t1985M09\t1985M10\t1985M11\t1985M12\t1986M01\t1986M02\t1986M03\t1986M04\t1986M05\t1986M06\t1986M07\t1986M08\t1986M09\t1986M10\t1986M11\t1986M12\t1987M01\t1987M02\t1987M03\t1987M04\t1987M05\t1987M06\t1987M07\t1987M08\t1987M09\t1987M10\t1987M11\t1987M12\t1988M01\t1988M02\t1988M03\t1988M04\t1988M05\t1988M06\t1988M07\t1988M08\t1988M09\t1988M10\t1988M11\t1988M12\t1989M01\t1989M02\t1989M03\t1989M04\t1989M05\t1989M06\t1989M07\t1989M08\t1989M09\t1989M10\t1989M11\t1989M12\t1990M01\t1990M02\t1990M03\t1990M04\t1990M05\t1990M06\t1990M07\t1990M08\t1990M09\t1990M10\t1990M11\t1990M12\t1991M01\t1991M02\t1991M03\t1991M04\t1991M05\t1991M06\t1991M07\t1991M08\t1991M09\t1991M10\t1991M11\t1991M12\t1992M01\t1992M02\t1992M03\t1992M04\t1992M05\t1992M06\t1992M07\t1992M08\t1992M09\t1992M10\t1992M11\t1992M12\t1993M01\t1993M02\t1993M03\t1993M04\t1993M05\t1993M06\t1993M07\t1993M08\t1993M09\t1993M10\t1993M11\t1993M12\t1994M01\t1994M02\t1994M03\t1994M04\t1994M05\t1994M06\t1994M07\t1994M08\t1994M09\t1994M10\t1994M11\t1994M12\t1995M01\t1995M02\t1995M03\t1995M04\t1995M05\t1995M06\t1995M07\t1995M08\t1995M09\t1995M10\t1995M11\t1995M12\t1996M01\t1996M02\t1996M03\t1996M04\t1996M05\t1996M06\t1996M07\t1996M08\t1996M09\t1996M10\t1996M11\t1996M12\t1997M01\t1997M02\t1997M03\t1997M04\t1997M05\t1997M06\t1997M07\t1997M08\t1997M09\t1997M10\t1997M11\t1997M12\t1998M01\t1998M02\t1998M03\t1998M04\t1998M05\t1998M06\t1998M07\t1998M08\t1998M09\t1998M10\t1998M11\t1998M12\t1999M01\t1999M02\t1999M03\t1999M04\t1999M05\t1999M06\t1999M07\t1999M08\t1999M09\t1999M10\t1999M11\t1999M12\t2000M01\t2000M02\t2000M03\t2000M04\t2000M05\t2000M06\t2000M07\t2000M08\t2000M09\t2000M10\t2000M11\t2000M12\t2001M01\t2001M02\t2001M03\t2001M04\t2001M05\t2001M06\t2001M07\t2001M08\t2001M09\t2001M10\t2001M11\t2001M12\t2002M01\t2002M02\t2002M03\t2002M04\t2002M05\t2002M06\t2002M07\t2002M08\t2002M09\t2002M10\t2002M11\t2002M12\t2003M01\t2003M02\t2003M03\t2003M04\t2003M05\t2003M06\t2003M07\t2003M08\t2003M09\t2003M10\t2003M11\t2003M12\t2004M01\t2004M02\t2004M03\t2004M04\t2004M05\t2004M06\t2004M07\t2004M08\t2004M09\t2004M10\t2004M11\t2004M12\t2005M01\t2005M02\t2005M03\t2005M04\t2005M05\t2005M06\t2005M07\t2005M08\t2005M09\t2005M10\t2005M11\t2005M12\t2006M01\t2006M02\t2006M03\t2006M04\t2006M05\t2006M06\t2006M07\t2006M08\t2006M09\t2006M10\t2006M11\t2006M12\t2007M01\t2007M02\t2007M03\t2007M04\t2007M05\t2007M06\t2007M07\t2007M08\t2007M09\t2007M10\t2007M11\t2007M12\t2008M01\t2008M02\t2008M03\t2008M04\t2008M05\t2008M06\t2008M07\t2008M08\t2008M09\t2008M10\t2008M11\t2008M12\t2009M01\t2009M02\t2009M03\t2009M04\t2009M05\t2009M06\t2009M07\t2009M08\t2009M09\t2009M10\t2009M11\t2009M12\t2010M01\t2010M02\t2010M03\t2010M04\t2010M05\t2010M06\t2010M07\t2010M08\t2010M09\t2010M10\t2010M11\t2010M12\t2011M01\t2011M02\t2011M03\t2011M04\t2011M05\t2011M06\t2011M07\t2011M08\t2011M09\t2011M10\t2011M11\t2011M12\t2012M01\t2012M02\t2012M03\t2012M04\t2012M05\t2012M06\t2012M07\t2012M08\t2012M09\t2012M10\t2012M11\t2012M12\t2013M01\t2013M02\t2013M03
Greece\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t29,9\t29,8\t30,0\t30,4\t30,7\t30,9\t30,1\t31,0\t30,6\t30,5\t30,6\t30,6\t31,8\t31,7\t31,7\t31,5\t31,4\t31,3\t32,1\t32,1\t31,7\t29,9\t29,8\t29,8\t29,7\t29,5\t29,4\t29,3\t29,2\t29,1\t27,9\t27,9\t27,8\t28,2\t28,0\t27,8\t28,4\t28,2\t28,1\t27,8\t27,7\t27,6\t28,3\t28,1\t28,0\t27,9\t27,8\t27,7\t26,9\t26,8\t26,7\t26,6\t26,6\t26,5\t26,1\t26,1\t26,1\t26,1\t26,0\t25,9\t26,6\t26,5\t26,5\t27,7\t27,5\t27,4\t27,5\t27,4\t27,3\t28,6\t28,3\t28,0\t27,2\t26,6\t26,5\t26,1\t25,5\t25,8\t26,1\t26,3\t26,3\t25,8\t25,2\t24,7\t25,0\t25,4\t26,2\t26,2\t26,5\t26,8\t26,9\t26,9\t26,1\t24,8\t25,1\t24,9\t25,1\t24,8\t24,8\t24,8\t24,5\t24,9\t25,0\t25,8\t27,2\t25,0\t24,3\t24,0\t23,3\t22,8\t22,3\t22,4\t22,8\t22,7\t22,5\t21,8\t21,7\t21,7\t22,6\t23,1\t22,0\t21,2\t21,2\t21,8\t21,8\t22,2\t21,9\t22,9\t23,9\t25,0\t25,0\t24,8\t25,2\t25,0\t24,6\t24,6\t25,3\t26,5\t27,3\t27,9\t28,8\t29,6\t30,3\t30,5\t31,2\t32,3\t31,9\t32,6\t32,6\t33,9\t34,9\t36,3\t37,2\t37,5\t39,5\t40,7\t44,2\t42,6\t43,6\t44,3\t45,8\t46,7\t47,4\t50,1\t51,3\t52,1\t52,5\t52,3\t53,1\t54,0\t55,4\t56,1\t57,0\t58,0\t56,3\t58,8\t58,4\t59,1\t:\t:
Spain\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t44,6\t44,4\t44,1\t43,5\t43,3\t43,4\t43,4\t43,6\t43,5\t42,5\t42,4\t42,3\t40,8\t40,8\t40,6\t40,4\t40,1\t40,1\t39,7\t39,4\t39,3\t39,2\t39,0\t38,7\t38,9\t38,8\t38,7\t36,8\t36,4\t35,9\t35,8\t35,5\t35,1\t34,9\t34,4\t33,8\t33,4\t32,7\t32,3\t31,7\t31,7\t31,2\t31,7\t31,8\t32,1\t31,4\t31,4\t31,0\t30,6\t30,5\t30,4\t30,4\t30,7\t30,3\t29,9\t29,6\t29,5\t28,9\t28,9\t28,8\t29,0\t29,0\t28,9\t29,0\t29,1\t29,2\t29,6\t29,4\t29,4\t29,2\t29,3\t29,9\t31,4\t31,6\t31,6\t32,2\t32,2\t32,9\t35,0\t35,6\t36,2\t37,7\t38,0\t38,9\t39,7\t39,9\t40,8\t41,9\t42,0\t42,4\t42,1\t42,0\t42,3\t43,1\t43,1\t43,0\t43,1\t43,1\t42,8\t42,4\t42,4\t42,1\t41,6\t41,9\t42,6\t40,0\t40,7\t40,5\t39,5\t39,6\t39,3\t39,2\t39,3\t39,4\t39,1\t39,1\t38,6\t39,2\t39,2\t39,2\t38,8\t38,7\t38,5\t38,3\t38,0\t37,7\t37,3\t36,9\t36,5\t36,3\t36,2\t35,8\t35,7\t35,4\t35,2\t34,8\t34,3\t34,1\t33,8\t33,4\t33,3\t33,0\t32,7\t32,7\t32,4\t32,2\t31,8\t31,4\t31,1\t30,5\t30,2\t29,7\t29,3\t28,4\t27,9\t27,4\t27,0\t26,6\t26,2\t25,8\t25,5\t25,1\t24,7\t24,6\t24,5\t24,4\t24,0\t23,5\t23,1\t22,9\t22,7\t22,7\t22,6\t22,5\t22,5\t22,1\t21,5\t20,2\t21,3\t21,1\t20,8\t21,6\t21,3\t21,1\t21,1\t20,9\t20,8\t20,8\t21,0\t21,2\t21,9\t21,5\t21,9\t22,1\t22,2\t22,4\t22,3\t22,5\t22,7\t22,7\t22,8\t22,8\t22,8\t22,9\t22,6\t22,4\t22,7\t22,7\t22,7\t22,8\t22,8\t22,7\t22,6\t22,5\t22,2\t21,9\t22,4\t22,2\t22,3\t22,2\t22,2\t22,1\t21,6\t21,4\t21,2\t21,2\t21,2\t20,9\t20,5\t20,1\t19,6\t19,1\t18,7\t18,6\t18,8\t18,7\t18,6\t18,2\t18,0\t18,1\t18,0\t17,9\t17,6\t17,6\t17,6\t17,6\t18,1\t18,1\t17,9\t17,6\t17,4\t17,4\t17,6\t17,5\t18,2\t18,3\t18,6\t18,6\t18,7\t19,2\t19,8\t20,4\t20,8\t21,0\t22,4\t23,3\t24,1\t24,4\t24,9\t25,9\t28,2\t29,9\t31,6\t33,4\t34,8\t36,1\t36,6\t37,1\t37,7\t39,0\t39,7\t40,1\t39,9\t39,5\t39,7\t39,8\t40,1\t40,5\t41,0\t41,3\t41,5\t41,6\t41,9\t42,2\t42,8\t43,3\t43,6\t43,9\t44,4\t44,9\t44,9\t45,2\t45,9\t46,7\t47,2\t47,9\t48,3\t48,9\t49,5\t50,2\t50,9\t51,3\t51,9\t52,6\t52,9\t53,6\t54,1\t54,5\t55,1\t55,2\t55,3\t55,4\t55,7\t:
Croatia\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t36,2\t36,0\t35,9\t35,3\t35,4\t35,2\t35,3\t35,3\t34,8\t34,9\t34,5\t34,1\t36,3\t35,9\t35,5\t36,3\t35,3\t35,1\t36,0\t35,4\t35,5\t35,0\t35,2\t35,1\t33,6\t33,5\t33,4\t32,8\t33,0\t32,8\t33,6\t33,5\t33,3\t32,6\t32,3\t32,1\t34,0\t33,8\t33,4\t33,2\t32,8\t32,5\t32,4\t31,9\t31,1\t30,9\t30,6\t30,2\t30,0\t29,6\t29,3\t30,0\t29,5\t29,2\t29,0\t28,8\t29,1\t27,8\t27,4\t27,0\t25,7\t25,3\t24,9\t24,9\t24,7\t24,3\t24,1\t23,7\t23,0\t23,6\t23,4\t23,1\t22,9\t22,6\t22,4\t22,1\t22,0\t21,9\t21,9\t22,0\t21,9\t22,2\t22,2\t22,6\t23,2\t23,5\t24,3\t23,4\t24,2\t24,4\t25,3\t25,7\t26,6\t25,8\t26,7\t27,2\t27,7\t28,5\t28,7\t32,1\t32,2\t33,0\t33,4\t34,0\t34,4\t35,6\t35,9\t36,2\t36,4\t36,5\t36,7\t36,1\t36,4\t36,8\t35,8\t36,1\t36,3\t35,6\t36,2\t36,7\t38,0\t38,6\t39,5\t39,6\t40,6\t41,3\t43,1\t44,0\t45,0\t47,4\t48,2\t49,2\t50,0\t51,0\t:
Portugal\t17,4\t17,6\t17,9\t18,3\t18,7\t19,2\t19,8\t20,1\t20,1\t20,2\t20,3\t20,4\t20,5\t20,4\t20,4\t20,7\t20,8\t21,1\t21,3\t21,3\t21,3\t21,3\t21,2\t21,0\t20,8\t20,8\t20,9\t20,9\t20,9\t20,7\t20,9\t21,2\t21,6\t21,7\t21,8\t21,6\t21,6\t21,4\t21,4\t21,1\t20,8\t20,3\t19,5\t19,1\t18,9\t18,9\t18,7\t18,4\t18,0\t17,9\t17,7\t17,6\t17,2\t16,7\t15,9\t15,6\t15,4\t15,0\t14,8\t14,6\t14,6\t14,5\t14,4\t14,4\t14,1\t13,5\t13,0\t12,7\t12,4\t12,2\t12,1\t12,2\t12,3\t12,2\t12,0\t11,8\t11,5\t11,7\t11,9\t11,8\t11,6\t11,6\t11,6\t11,5\t11,3\t11,1\t11,0\t10,7\t10,9\t11,3\t10,8\t10,7\t10,5\t10,2\t9,9\t9,7\t9,6\t9,4\t9,0\t8,8\t9,0\t9,2\t9,5\t9,6\t9,5\t9,6\t9,6\t9,5\t9,6\t9,7\t9,8\t10,0\t10,1\t10,1\t10,0\t10,1\t10,2\t10,4\t10,6\t11,0\t11,3\t11,6\t12,1\t12,1\t12,2\t12,2\t12,7\t13,0\t13,3\t13,4\t13,5\t13,7\t13,9\t14,1\t14,2\t14,4\t14,6\t14,6\t14,5\t14,5\t14,8\t15,2\t15,6\t15,7\t15,8\t15,9\t16,1\t16,3\t16,3\t16,1\t16,0\t15,8\t16,0\t16,2\t16,3\t16,4\t16,4\t16,6\t16,9\t17,1\t17,2\t17,0\t16,7\t16,5\t16,2\t16,1\t16,1\t16,1\t16,0\t16,0\t15,4\t15,0\t14,7\t14,5\t14,5\t14,4\t14,4\t14,3\t13,9\t13,1\t14,2\t13,8\t13,0\t12,4\t12,0\t11,9\t12,2\t12,4\t12,7\t12,9\t12,6\t12,3\t11,9\t11,6\t11,6\t11,9\t11,9\t11,6\t10,8\t10,2\t9,6\t9,3\t9,6\t10,2\t11,2\t11,6\t11,4\t10,6\t10,3\t10,2\t10,4\t10,4\t10,2\t9,8\t9,8\t10,0\t10,6\t11,1\t11,6\t11,7\t11,7\t11,7\t11,2\t10,9\t11,3\t11,9\t12,3\t12,4\t12,4\t12,4\t12,8\t13,4\t13,8\t14,2\t14,6\t15,0\t15,4\t15,8\t16,2\t16,3\t16,4\t16,6\t17,0\t17,4\t17,6\t17,8\t17,9\t17,9\t18,7\t18,9\t19,0\t18,8\t18,3\t18,3\t18,6\t18,3\t18,6\t19,0\t19,5\t19,7\t20,0\t19,2\t18,8\t18,7\t18,7\t19,1\t19,4\t20,1\t20,5\t20,5\t20,3\t20,3\t20,4\t20,0\t19,6\t19,1\t18,8\t18,8\t18,9\t19,4\t19,9\t20,0\t20,2\t20,6\t20,7\t20,9\t21,3\t21,6\t21,7\t21,7\t21,5\t20,9\t20,1\t19,8\t19,7\t19,7\t19,6\t19,8\t19,8\t19,8\t19,8\t19,8\t19,2\t18,9\t19,1\t19,6\t20,3\t20,9\t21,3\t19,6\t22,1\t22,7\t23,4\t24,0\t24,6\t25,1\t25,0\t24,4\t23,4\t23,3\t24,3\t25,7\t26,6\t27,1\t27,6\t27,1\t27,1\t26,9\t27,0\t27,3\t28,3\t29,1\t28,8\t27,8\t27,3\t27,0\t26,8\t27,1\t27,6\t28,3\t29,2\t29,1\t29,5\t30,2\t31,3\t33,0\t34,2\t34,8\t34,6\t34,8\t35,7\t36,9\t37,7\t39,0\t39,4\t39,6\t39,0\t38,7\t38,3\t38,0\t38,3\t38,2\t:
Italy\t23,8\t24,4\t25,1\t25,0\t25,1\t25,5\t25,6\t25,7\t25,9\t26,3\t26,8\t27,0\t27,4\t27,3\t27,0\t27,2\t27,0\t26,7\t26,8\t26,7\t26,9\t27,0\t26,9\t27,3\t28,2\t28,5\t28,4\t28,2\t28,4\t28,6\t28,8\t28,9\t28,9\t29,1\t29,4\t29,5\t29,2\t29,1\t29,2\t29,3\t29,2\t29,3\t29,1\t29,3\t29,5\t29,4\t29,6\t29,8\t29,9\t29,8\t29,8\t31,6\t32,6\t32,1\t30,4\t30,3\t30,3\t30,2\t30,0\t30,1\t29,9\t29,8\t29,9\t30,0\t29,9\t29,8\t29,0\t29,0\t28,8\t29,0\t29,1\t28,9\t29,5\t29,5\t29,3\t29,2\t29,3\t29,4\t29,0\t28,7\t28,3\t28,0\t27,8\t27,4\t26,9\t26,7\t26,4\t26,6\t26,9\t27,2\t26,8\t26,6\t26,8\t27,1\t27,2\t27,3\t25,5\t25,4\t25,2\t24,9\t24,8\t24,7\t25,3\t25,4\t25,8\t26,5\t26,7\t26,3\t26,3\t26,7\t26,7\t26,3\t26,1\t26,1\t27,3\t27,9\t27,4\t25,5\t25,3\t25,3\t26,2\t26,4\t26,9\t28,2\t28,3\t28,2\t28,3\t28,2\t28,3\t29,7\t29,7\t29,8\t28,8\t28,8\t28,8\t29,0\t28,9\t28,9\t28,6\t28,6\t28,6\t30,2\t30,1\t30,2\t30,4\t30,3\t30,4\t30,3\t30,2\t30,2\t30,6\t30,5\t30,5\t30,0\t30,0\t30,1\t29,4\t29,4\t29,5\t31,4\t31,4\t31,4\t30,2\t30,1\t30,1\t30,4\t30,4\t30,5\t30,2\t30,2\t30,3\t31,1\t31,0\t31,0\t29,6\t29,6\t29,6\t29,8\t29,8\t29,8\t29,8\t29,7\t29,7\t30,1\t30,0\t30,0\t29,2\t29,2\t29,1\t30,5\t30,4\t30,4\t29,9\t29,9\t29,8\t29,1\t29,0\t28,9\t27,7\t27,7\t27,6\t28,4\t28,3\t28,2\t27,6\t27,5\t27,5\t27,7\t27,6\t27,5\t27,2\t27,1\t27,0\t25,8\t25,7\t25,6\t24,6\t24,6\t24,5\t24,1\t24,0\t23,8\t24,3\t24,2\t24,2\t23,5\t23,5\t23,5\t23,3\t23,3\t23,2\t23,2\t23,1\t23,0\t23,2\t23,1\t23,1\t22,7\t22,7\t22,7\t24,3\t24,2\t24,2\t24,9\t24,8\t24,7\t23,4\t23,4\t23,3\t22,1\t22,2\t22,2\t23,0\t23,1\t23,0\t24,0\t23,8\t24,0\t22,9\t22,9\t23,3\t23,6\t24,4\t23,5\t24,2\t24,3\t24,3\t23,8\t23,6\t23,6\t24,5\t24,3\t24,1\t23,9\t22,6\t23,3\t23,1\t23,9\t22,2\t22,1\t22,2\t20,8\t20,3\t20,7\t20,9\t20,6\t20,7\t20,2\t20,9\t19,0\t19,6\t19,6\t19,5\t20,1\t19,9\t20,9\t20,1\t21,4\t20,2\t21,6\t20,5\t20,9\t20,4\t20,3\t21,0\t22,3\t22,1\t22,3\t22,3\t22,2\t23,5\t22,6\t23,7\t23,5\t24,6\t24,6\t24,4\t25,1\t26,0\t25,9\t26,6\t26,8\t26,2\t26,6\t27,2\t28,1\t26,6\t29,4\t28,2\t27,4\t26,7\t27,5\t27,9\t28,3\t27,9\t28,5\t28,5\t27,6\t27,8\t27,4\t27,8\t27,8\t28,6\t29,3\t30,5\t30,4\t31,8\t31,8\t32,3\t33,9\t35,2\t34,7\t35,3\t34,3\t35,0\t34,4\t36,1\t36,3\t37,4\t37,1\t38,6\t37,8\t:
Cyprus\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t10,3\t10,3\t10,3\t10,3\t10,3\t10,3\t9,7\t9,7\t9,7\t9,2\t9,2\t9,2\t8,4\t8,4\t8,4\t8,3\t8,3\t8,3\t8,3\t8,3\t8,3\t7,9\t7,9\t7,9\t7,7\t7,7\t7,7\t8,0\t8,0\t8,0\t8,1\t8,1\t8,1\t8,3\t8,3\t8,3\t8,5\t8,5\t8,5\t9,0\t9,0\t9,0\t8,7\t8,7\t8,7\t8,7\t8,7\t8,7\t8,6\t8,6\t8,6\t9,3\t9,3\t9,3\t11,2\t11,2\t11,2\t11,7\t11,7\t11,7\t13,2\t13,2\t13,2\t13,9\t13,9\t13,9\t13,9\t13,9\t13,9\t14,1\t14,1\t14,1\t11,5\t11,5\t11,5\t10,0\t10,0\t10,0\t8,2\t8,2\t8,2\t9,8\t9,8\t9,8\t10,2\t10,2\t10,2\t10,6\t10,6\t10,6\t10,2\t10,2\t10,2\t9,6\t9,6\t9,6\t10,5\t10,5\t10,5\t8,0\t8,0\t8,0\t8,5\t8,5\t8,5\t9,3\t9,3\t9,3\t9,6\t9,6\t9,6\t13,3\t13,3\t13,3\t16,7\t16,7\t16,7\t16,7\t16,7\t16,7\t18,5\t18,5\t18,5\t17,8\t17,8\t17,8\t15,1\t15,1\t15,1\t14,7\t14,7\t14,7\t19,1\t19,1\t19,1\t20,7\t20,7\t20,7\t23,5\t23,5\t23,5\t25,8\t25,8\t25,8\t25,3\t25,3\t25,3\t26,8\t26,8\t26,8\t27,5\t27,5\t27,5\t31,8\t31,8\t31,8\t:\t:\t:
France\t15,4\t15,4\t15,3\t15,3\t15,5\t15,7\t15,9\t16,2\t16,4\t16,8\t17,2\t17,5\t18,1\t18,5\t19,0\t19,4\t19,6\t19,8\t20,0\t20,0\t20,1\t20,3\t20,3\t20,3\t20,3\t20,2\t20,1\t19,8\t19,6\t19,6\t19,4\t19,3\t19,2\t19,0\t18,9\t18,8\t18,7\t18,7\t18,8\t18,8\t18,9\t18,9\t18,8\t18,8\t18,8\t18,6\t18,5\t18,4\t18,3\t18,3\t18,3\t18,2\t18,1\t18,0\t17,9\t17,9\t17,9\t17,8\t17,8\t17,8\t17,7\t17,6\t17,4\t17,2\t17,0\t16,9\t16,8\t16,7\t16,5\t16,3\t16,0\t15,8\t15,6\t15,5\t15,4\t15,3\t15,3\t15,1\t15,1\t15,1\t15,0\t14,9\t14,9\t14,9\t14,7\t14,6\t14,5\t14,5\t14,5\t14,6\t14,7\t14,8\t14,9\t15,0\t15,1\t15,3\t15,3\t15,4\t15,6\t15,8\t16,0\t16,2\t16,5\t16,6\t16,7\t16,7\t16,8\t16,9\t16,9\t17,0\t17,1\t17,2\t17,4\t17,6\t18,0\t18,3\t18,5\t18,9\t19,3\t19,7\t19,9\t20,1\t20,4\t20,7\t21,1\t21,4\t21,8\t22,0\t22,2\t22,4\t22,7\t22,9\t23,1\t23,1\t23,2\t23,2\t23,2\t23,2\t23,0\t22,8\t22,5\t22,3\t22,1\t22,1\t21,8\t21,6\t21,6\t21,7\t21,7\t21,3\t20,7\t20,9\t21,1\t21,2\t21,6\t20,5\t20,2\t22,1\t22,2\t22,0\t22,1\t22,3\t22,4\t22,6\t22,8\t23,0\t23,2\t23,3\t23,7\t23,6\t23,5\t23,3\t23,1\t23,0\t22,8\t22,6\t22,5\t22,5\t22,3\t22,1\t22,3\t22,2\t22,1\t21,8\t21,6\t21,4\t21,4\t21,4\t21,4\t21,3\t21,3\t21,2\t23,6\t23,6\t23,7\t23,5\t23,4\t23,3\t22,9\t22,7\t22,3\t21,9\t21,6\t21,2\t20,9\t20,7\t20,4\t20,0\t19,7\t19,5\t19,3\t19,3\t19,0\t18,6\t18,3\t18,2\t16,2\t16,3\t16,2\t16,1\t16,1\t16,2\t16,3\t16,4\t16,4\t16,5\t16,7\t16,7\t17,0\t17,0\t17,1\t17,2\t17,3\t17,3\t17,4\t17,4\t17,4\t17,3\t17,4\t17,4\t18,0\t17,9\t18,2\t19,0\t19,1\t19,2\t19,1\t18,4\t19,5\t20,0\t20,2\t20,6\t20,4\t20,5\t20,5\t20,4\t20,5\t20,7\t20,9\t20,9\t20,9\t20,8\t21,0\t21,0\t20,8\t20,7\t20,5\t20,3\t20,5\t20,9\t21,7\t22,1\t22,1\t21,7\t21,8\t22,0\t22,6\t23,0\t23,1\t22,8\t22,5\t22,4\t22,2\t22,2\t22,0\t22,1\t21,9\t21,7\t21,5\t21,3\t20,9\t20,5\t20,2\t19,7\t19,2\t18,8\t18,8\t19,2\t19,0\t18,6\t18,1\t17,8\t18,0\t18,6\t18,8\t19,2\t19,3\t19,4\t19,7\t20,3\t20,9\t21,6\t22,3\t23,2\t23,9\t24,3\t24,4\t24,1\t24,0\t24,2\t24,2\t24,5\t24,3\t23,8\t23,6\t23,6\t23,5\t23,6\t23,9\t24,0\t24,2\t24,5\t23,9\t22,9\t22,6\t22,8\t23,2\t23,5\t23,3\t23,0\t22,8\t22,6\t22,4\t22,1\t22,2\t22,7\t23,1\t23,2\t23,1\t23,0\t23,1\t23,2\t23,7\t24,1\t24,8\t25,0\t25,2\t25,3\t25,3\t25,5\t26,0\t26,2\t:
United\tKingdom\t20,0\t20,0\t20,1\t20,5\t20,0\t19,8\t19,7\t19,5\t19,7\t19,5\t19,5\t19,4\t19,3\t19,2\t19,2\t19,0\t19,0\t18,8\t18,7\t18,6\t18,7\t18,6\t18,6\t18,5\t18,3\t18,3\t18,1\t18,0\t18,1\t18,0\t18,0\t18,0\t18,0\t18,0\t18,0\t18,0\t18,0\t18,1\t18,1\t18,2\t18,1\t18,0\t17,9\t17,7\t17,5\t17,4\t17,2\t16,9\t16,7\t16,3\t16,1\t15,9\t15,6\t15,4\t15,1\t14,8\t14,7\t14,5\t14,2\t14,0\t13,7\t13,4\t13,2\t12,9\t12,7\t12,4\t12,1\t11,9\t11,5\t11,1\t11,0\t10,7\t10,6\t10,4\t10,3\t10,1\t9,9\t9,8\t9,9\t9,7\t9,7\t9,8\t9,8\t9,8\t9,9\t10,0\t9,9\t10,0\t10,1\t10,1\t10,3\t10,5\t10,7\t11,0\t11,4\t11,8\t12,0\t12,4\t12,9\t13,3\t13,6\t13,6\t14,0\t14,3\t14,6\t14,7\t14,9\t15,0\t15,3\t15,3\t15,3\t15,6\t15,8\t16,6\t16,7\t16,8\t16,8\t17,1\t17,1\t17,2\t17,4\t17,5\t17,6\t17,5\t17,4\t17,6\t17,5\t17,5\t17,4\t17,4\t17,4\t17,3\t16,8\t16,7\t16,6\t16,6\t16,6\t16,6\t16,6\t16,5\t16,4\t15,9\t15,8\t15,7\t15,7\t15,7\t15,7\t15,6\t15,5\t15,4\t15,1\t15,0\t15,0\t15,0\t14,8\t14,9\t15,0\t15,0\t15,1\t15,0\t14,9\t14,8\t14,7\t14,8\t14,9\t14,9\t14,9\t14,6\t14,4\t14,2\t14,0\t14,0\t13,9\t14,1\t13,9\t13,6\t13,3\t13,0\t13,0\t12,9\t12,9\t12,9\t13,0\t12,9\t13,0\t12,9\t13,1\t13,1\t13,1\t13,3\t13,2\t13,3\t13,2\t13,0\t12,9\t12,9\t13,0\t13,0\t12,8\t12,4\t12,0\t12,1\t12,1\t12,5\t12,3\t12,4\t12,6\t12,6\t12,3\t11,8\t11,7\t11,9\t12,1\t12,1\t12,0\t11,9\t11,9\t11,6\t11,4\t11,2\t11,4\t11,6\t11,6\t11,7\t11,8\t12,1\t12,2\t12,2\t11,9\t12,0\t11,9\t12,0\t11,8\t12,0\t12,0\t12,0\t11,9\t12,2\t12,2\t12,2\t12,5\t12,7\t12,4\t12,4\t12,2\t12,7\t12,5\t12,4\t11,9\t11,7\t11,7\t11,8\t11,7\t11,8\t11,7\t11,6\t11,8\t12,2\t12,2\t12,3\t12,1\t12,3\t12,4\t12,6\t12,6\t12,2\t12,2\t12,7\t12,7\t12,4\t12,4\t12,5\t13,4\t13,5\t13,8\t13,5\t13,4\t13,4\t13,7\t14,0\t14,1\t14,0\t14,2\t14,4\t14,3\t13,8\t14,0\t14,1\t14,5\t14,4\t14,6\t14,7\t14,6\t14,3\t14,5\t14,4\t14,1\t13,9\t13,6\t13,5\t13,6\t13,7\t14,1\t13,9\t14,5\t14,6\t15,2\t15,4\t15,7\t16,2\t16,3\t16,5\t17,0\t18,0\t18,7\t19,1\t19,0\t19,4\t19,7\t19,8\t19,9\t19,4\t19,3\t19,3\t19,7\t20,0\t19,9\t19,6\t19,4\t19,1\t18,9\t18,4\t19,2\t20,1\t20,2\t20,2\t20,3\t20,0\t19,5\t19,9\t20,5\t21,0\t21,6\t21,9\t22,1\t22,1\t22,0\t22,0\t22,0\t21,8\t21,7\t21,3\t21,1\t20,9\t20,5\t20,6\t20,2\t20,3\t20,6\t21,0\t20,7\t:\t:
Norway\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t11,5\t11,1\t10,2\t11,2\t11,8\t12,0\t12,0\t13,1\t13,8\t13,4\t13,3\t13,1\t13,4\t13,1\t12,5\t12,2\t12,6\t13,2\t13,1\t12,1\t11,7\t12,1\t13,0\t13,4\t13,2\t13,4\t14,0\t14,2\t13,9\t13,7\t13,3\t13,1\t12,1\t12,6\t13,8\t14,8\t15,2\t14,7\t14,2\t14,1\t14,2\t14,7\t14,7\t15,3\t15,7\t15,5\t14,8\t14,5\t14,4\t14,2\t14,6\t14,9\t14,2\t13,9\t14,1\t15,5\t15,7\t15,6\t14,4\t13,2\t12,9\t12,8\t13,3\t13,9\t13,9\t13,8\t13,7\t14,0\t14,2\t13,6\t13,5\t13,8\t13,9\t14,8\t14,2\t13,2\t12,5\t12,6\t12,3\t11,9\t11,6\t12,0\t11,8\t12,3\t12,0\t13,4\t13,5\t13,4\t12,7\t12,2\t12,0\t11,5\t11,4\t11,5\t11,6\t11,8\t11,8\t10,6\t10,1\t10,6\t11,3\t10,8\t10,4\t10,2\t9,8\t9,3\t9,4\t9,4\t9,2\t8,7\t8,9\t10,3\t9,9\t10,1\t9,3\t8,7\t8,4\t8,2\t8,5\t7,7\t7,8\t8,3\t9,4\t9,4\t9,2\t8,3\t8,6\t8,7\t10,2\t10,0\t10,0\t10,3\t10,4\t10,5\t10,1\t9,3\t8,2\t8,3\t8,7\t10,5\t10,2\t10,5\t10,2\t10,3\t10,1\t9,9\t9,4\t8,8\t9,2\t10,1\t10,5\t10,1\t10,2\t10,7\t10,9\t10,7\t11,4\t11,4\t11,6\t11,5\t10,7\t10,2\t9,5\t10,4\t10,6\t11,0\t10,9\t10,5\t10,8\t10,9\t11,2\t11,5\t10,7\t10,6\t10,7\t12,1\t12,0\t11,4\t11,0\t11,0\t10,3\t10,8\t10,7\t11,3\t11,3\t11,4\t11,7\t11,3\t11,5\t11,1\t11,5\t11,5\t11,5\t11,1\t11,5\t11,5\t11,8\t11,7\t11,9\t11,6\t11,2\t11,0\t11,5\t10,8\t10,0\t9,1\t9,5\t10,0\t9,8\t9,2\t9,1\t8,5\t7,6\t7,1\t7,1\t8,2\t8,3\t8,2\t7,9\t7,3\t7,1\t7,1\t7,1\t7,2\t6,8\t6,7\t6,7\t6,8\t7,1\t7,2\t7,0\t6,4\t6,3\t6,5\t7,0\t7,4\t7,9\t8,0\t8,3\t8,3\t8,9\t8,6\t9,0\t8,6\t9,1\t9,1\t9,6\t9,8\t9,4\t9,5\t9,2\t9,4\t9,0\t9,1\t9,2\t9,7\t10,1\t9,5\t9,0\t8,4\t9,0\t8,9\t9,5\t9,3\t9,4\t9,0\t8,7\t8,8\t8,2\t8,3\t8,7\t8,9\t9,2\t8,6\t8,5\t8,2\t8,1\t7,9\t7,9\t8,1\t8,0\t8,3\t8,2\t8,9\t8,9\t9,4\t9,7\t9,7\t:\t:\t:
Austria\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t6,1\t6,0\t5,8\t5,8\t5,8\t5,7\t5,6\t5,6\t5,6\t5,6\t5,5\t5,5\t5,5\t5,5\t5,5\t5,5\t5,5\t5,6\t5,6\t5,6\t5,7\t5,8\t5,9\t5,9\t6,0\t6,1\t6,2\t6,3\t6,2\t6,2\t6,3\t6,4\t6,4\t6,5\t6,5\t6,5\t6,6\t6,6\t6,6\t6,6\t6,7\t6,7\t6,8\t6,8\t6,7\t6,7\t6,7\t6,7\t6,7\t6,7\t6,8\t6,7\t6,6\t6,6\t6,5\t6,3\t6,1\t6,0\t5,9\t5,7\t5,6\t5,5\t5,5\t5,5\t5,4\t5,2\t5,3\t5,3\t5,3\t5,3\t5,4\t5,4\t5,5\t5,5\t5,4\t5,2\t5,2\t5,2\t5,1\t5,2\t5,2\t5,2\t5,2\t5,3\t5,4\t5,4\t5,5\t5,5\t5,6\t5,7\t5,8\t5,9\t6,0\t6,1\t6,3\t6,4\t6,5\t6,6\t6,6\t6,8\t6,8\t6,8\t6,8\t6,8\t6,8\t6,8\t6,7\t6,7\t6,7\t6,8\t6,9\t7,1\t7,5\t8,0\t8,4\t8,6\t8,9\t9,1\t9,4\t9,7\t12,2\t11,4\t10,6\t9,7\t8,5\t7,8\t8,4\t9,1\t9,4\t9,5\t9,9\t9,9\t10,0\t9,6\t9,3\t10,1\t11,3\t11,6\t11,1\t10,3\t9,6\t10,2\t10,5\t10,5\t10,2\t10,4\t10,4\t9,2\t8,3\t8,4\t8,2\t8,6\t9,6\t8,8\t8,0\t8,2\t8,0\t8,0\t8,8\t9,7\t9,2\t8,9\t9,9\t9,7\t8,6\t8,4\t7,8\t7,2\t8,2\t8,4\t7,5\t6,8\t7,1\t7,1\t7,0\t7,4\t8,0\t8,6\t9,7\t10,2\t9,3\t8,9\t9,5\t10,0\t10,1\t10,8\t10,7\t10,2\t10,1\t10,4\t9,8\t9,5\t9,4\t9,6\t9,1\t8,5\t9,0\t8,7\t8,7\t9,6\t9,1\t7,6\t8,0\t8,2\t8,1\t8,6\t8,7\t8,6\t8,5\t7,9\t7,6\t7,0\t7,7\t8,9\t8,9\t8,3\t8,6\t8,7\t9,1\t8,9\t8,5\t8,5\t9,0\t9,2\t8,9\t8,6\t8,4\t9,0\t9,3\t8,9\t:
Germany\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t:\t5,7\t5,7\t5,7\t5,7\t5,7\t5,7\t5,8\t5,8\t5,9\t5,9\t5,9\t6,0\t6,0\t6,1\t6,1\t6,2\t6,3\t6,4\t6,5\t6,6\t6,8\t6,9\t7,1\t7,2\t7,3\t7,5\t7,6\t7,8\t7,9\t8,0\t8,1\t8,3\t8,4\t8,5\t8,6\t8,7\t8,8\t8,9\t9,0\t9,1\t9,1\t9,1\t9,0\t9,0\t8,9\t8,9\t8,9\t8,8\t8,8\t8,7\t8,7\t8,7\t8,7\t8,8\t8,9\t9,0\t9,1\t9,2\t9,3\t9,4\t9,5\t9,6\t9,7\t9,8\t9,9\t10,0\t10,1\t10,2\t10,3\t10,4\t10,5\t10,5\t10,6\t10,7\t10,8\t10,8\t10,8\t10,7\t10,7\t10,6\t10,5\t10,4\t10,4\t10,3\t10,2\t10,1\t10,1\t10,0\t9,9\t9,8\t9,8\t9,7\t9,6\t9,5\t9,4\t9,4\t9,3\t9,2\t9,2\t9,1\t9,1\t9,0\t9,0\t9,0\t9,0\t9,0\t9,0\t9,0\t9,0\t9,0\t9,0\t8,9\t8,9\t8,8\t8,7\t8,6\t8,5\t8,5\t8,4\t8,3\t8,2\t8,1\t8,1\t8,1\t8,1\t8,2\t8,3\t8,4\t8,5\t8,7\t8,8\t9,0\t9,1\t9,3\t9,4\t9,5\t9,6\t9,8\t9,9\t10,1\t10,2\t10,4\t10,5\t10,7\t10,9\t11,1\t11,2\t11,3\t11,4\t11,6\t11,7\t11,8\t11,8\t11,9\t12,0\t12,1\t12,2\t12,5\t12,7\t13,1\t13,4\t13,8\t14,1\t14,3\t14,6\t14,8\t15,2\t15,6\t16,0\t16,3\t16,5\t16,4\t16,2\t16,0\t15,8\t15,7\t15,5\t15,3\t15,0\t14,6\t14,3\t14,0\t13,9\t13,9\t13,9\t13,9\t13,9\t13,8\t13,6\t13,4\t13,1\t12,9\t12,6\t12,4\t12,1\t11,9\t11,8\t11,7\t11,7\t11,7\t11,7\t11,6\t11,5\t11,4\t11,2\t11,1\t10,9\t10,7\t10,5\t10,3\t10,1\t10,0\t10,0\t10,1\t10,3\t10,6\t10,9\t11,2\t11,3\t11,5\t11,5\t11,5\t11,5\t11,5\t11,5\t11,5\t11,4\t11,3\t11,2\t11,0\t10,7\t10,5\t10,3\t10,1\t9,9\t9,8\t9,6\t9,4\t9,3\t9,1\t9,0\t9,0\t8,9\t8,9\t8,8\t8,7\t8,6\t8,5\t8,4\t8,3\t8,2\t8,2\t8,1\t8,1\t8,1\t8,1\t8,1\t8,1\t8,0\t8,0\t8,0\t8,0\t8,0\t7,9\t7,8\t7,7\t:
"
        );
        $datasets[] = array(
            'id' => 'us-trade',
            'title' => __('US Trade with United Kingdom'),
            'type' => __('Line chart'),
            'presets' => array(
                'type' => 'line-chart',
                'metadata.describe.source-name' => 'US Census Bureau',
                'metadata.describe.source-url' => 'http://www.census.gov/foreign-trade/balance/c4120.html',
                'metadata.data.vertical-header' => true,
                'metadata.describe.number-format' => 'n1',
                'metadata.describe.number-divisor' => '3',
                'metadata.describe.number-append' => ' Billion USD',
                'metadata.visualize.sort-values' => false,
                'metadata.data.transpose' => false
            ),
            'data' => "\tImports\tExports
1985\t31965.608\t24123.792
1986\t32331.39\t23978.43
1987\t35202.636\t28651.014
1988\t35054.175\t35810.58
1989\t34073.526\t38756.82
1990\t35531.408\t41343.28
1991\t31117.801\t37257.233
1992\t32952.848\t37391.836
1993\t34551.177\t42036.738
1994\t38838.97\t41694.225
1995\t40663.847\t43573.315
1996\t42598.689\t45514.581
1997\t46702.656\t52088.179
1998\t49122.003\t55071.921
1999\t54147.474\t53001.936
2000\t58082.434\t55704.604
2001\t53779.31\t52928.46
2002\t52153.472\t42502.016
2003\t53493.69681625\t42284.9120525
2004\t56454.06451384\t43800.02305036
2005\t60218.4929039\t45510.33799428
2006\t61004.84107176\t51767.52144762
2007\t63111.87209175\t55479.45533967
2008\t62688.49984317\t57351.00459077
2009\t50803.48289813\t48902.85013178
2010\t52740.81484518\t51406.46960534
2011\t52260.822\t56998.314"
        );
        $datasets[] = array(
            'id' => 'marriages',
            'title' => __('Marriages in Germany'),
            'chartid' => '',
            'type' => __('Line chart'),
            'presets' => array(
                'type' => 'line-chart',
                'metadata.describe.source-name' => 'Statistisches Bundesamt',
                'metadata.describe.source-url' => 'http://destatis.de',
                'metadata.data.vertical-header' => true,
                'metadata.data.transpose' => false
            ),
            'data' => __('Year').'  '.__('Marriages')."\n1946\t8.1\n1947\t9.8\n1948\t10.5\n1949\t10.2\n1950\t11.0\n1951\t10.4\n1952\t9.5\n1953\t8.9\n1954\t8.7\n1955\t8.8\n1956\t8.9\n1957\t8.9\n1958\t9.1\n1959\t9.2\n1960\t9.5\n1961\t9.5\n1962\t9.4\n1963\t8.8\n1964\t8.5\n1965\t8.2\n1966\t8.0\n1967\t7.9\n1968\t7.3\n1969\t7.4\n1970\t7.4\n1971\t7.2\n1972\t7.0\n1973\t6.7\n1974\t6.5\n1975\t6.7\n1976\t6.5\n1977\t6.5\n1978\t6.0\n1979\t6.2\n1980\t6.3\n1981\t6.2\n1982\t6.2\n1983\t6.3\n1984\t6.4\n1985\t6.4\n1986\t6.6\n1987\t6.7\n1988\t6.8\n1989\t6.7\n1990\t6.5\n1991\t5.7\n1992\t5.6\n1993\t5.5\n1994\t5.4\n1995\t5.3\n1996\t5.2\n1997\t5.2\n1998\t5.1\n1999\t5.2\n2000\t5.1\n2001\t4.7\n2002\t4.8\n2003\t4.6\n2004\t4.8\n2005\t4.7\n2006\t4.5\n2007\t4.5\n2008\t4.6\n2009\t4.6\n2010\t4.7\n2011\t4.6"
        );
        return $datasets;
    }
}
