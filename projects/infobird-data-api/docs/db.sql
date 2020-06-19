
CREATE DATABASE vue_form_design;

USE vue_form_design;

-- ui组件 --
CREATE TABLE `vfd_form` (
  `form_no` varchar(60) NOT NULL DEFAULT '' COMMENT '组件编号',
  `form_name` varchar(40) NOT NULL DEFAULT '' COMMENT '名称',
  `components` text NOT NULL COMMENT '组件信息',
  `describe` varchar(500) NOT NULL DEFAULT '' COMMENT '描述',
  `gmt_create` DATETIME NOT NULL COMMENT '创建日期',
  `gmt_modified` DATETIME NOT NULL COMMENT '更新日期',
  PRIMARY KEY (`form_no`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC COMMENT='组件';

-- ui数据 --
CREATE TABLE `vfd_data` (
  `data_no` varchar(60) NOT NULL DEFAULT '' COMMENT '数据编号',
  `form_no` varchar(60) NOT NULL DEFAULT '' COMMENT '组件编号',
  `data` text NOT NULL COMMENT '数据信息',
  `gmt_create` DATETIME NOT NULL COMMENT '创建日期',
  `gmt_modified` DATETIME NOT NULL COMMENT '更新日期',
  PRIMARY KEY (`data_no`),
  KEY inx_form_no(form_no)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC COMMENT='数据';

