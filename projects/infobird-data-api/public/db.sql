SET NAMES utf8mb4;

-- ----------------------------
-- Table structure for siam_auths
-- ----------------------------
DROP TABLE IF EXISTS `siam_auths`;
CREATE TABLE `siam_auths`  (
  `auth_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '权限id',
  `auth_name` varchar(40) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '权限名',
  `auth_rules` varchar(40) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '0' COMMENT '路由地址',
  `auth_icon` varchar(30) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '' COMMENT '图标',
  `auth_type` tinyint(1) NOT NULL DEFAULT 0 COMMENT '权限类型 1菜单2按钮3api',
  `create_time` int(11) NOT NULL DEFAULT 0 COMMENT '创建时间',
  `update_time` int(11) NOT NULL DEFAULT 0 COMMENT '更新时间',
  PRIMARY KEY (`auth_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 8 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of siam_auths
-- ----------------------------
INSERT INTO `siam_auths` (`auth_id`, `auth_name`, `auth_rules`, `auth_icon`, `auth_type`, `create_time`, `update_time`) VALUES
(1, '玫瑰图数据', '/api/roseChart', '', 3, 1562548805, 1562548805),
(2, '清空权限缓存', '/api/system/clearCache', '', 3, 1562548820, 1562548820),
(3, '添加角色', '/api/roles/add', '', 3, 1562551947, 1562551947);

-- ----------------------------
-- Table structure for siam_roles
-- ----------------------------
DROP TABLE IF EXISTS `siam_roles`;
CREATE TABLE `siam_roles`  (
  `role_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '用户id',
  `role_name` varchar(40) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '角色名',
  `role_auth` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '0' COMMENT '角色权限',
  `role_status` tinyint(1) NOT NULL DEFAULT 0 COMMENT '角色状态 0正常1禁用',
  `level` tinyint(1) NOT NULL DEFAULT 0 COMMENT '角色级别 越小权限越高',
  `create_time` int(11) NOT NULL DEFAULT 0 COMMENT '创建时间',
  `update_time` int(11) NOT NULL DEFAULT 0 COMMENT '更新时间',
  PRIMARY KEY (`role_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of siam_roles
-- ----------------------------
INSERT INTO `siam_roles` VALUES (1, '管理员', '1,2,3,4', 0, 0, 0, 0);
INSERT INTO `siam_roles` VALUES (2, '测试', '1,2', 0, 1, 0, 0);

-- ----------------------------
-- Table structure for siam_users
-- ----------------------------
DROP TABLE IF EXISTS `siam_users`;
CREATE TABLE `siam_users`  (
  `u_id` int(11) NOT NULL AUTO_INCREMENT,
  `u_password` varchar(32) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT 'e10adc3949ba59abbe56e057f20f883e' COMMENT '用户密码',
  `u_name` varchar(32) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '' COMMENT '用户名',
  `u_account` varchar(32) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '用户登录名',
  `p_u_id` varchar(10) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '' COMMENT '上级u_id',
  `role_id` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `u_status` tinyint(1) NOT NULL DEFAULT 1 COMMENT '用户状态 -1删除 0禁用 1正常',
  `u_level_line` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '0-' COMMENT '用户层级链',
  `last_login_ip` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '0' COMMENT '最后登录IP',
  `last_login_time` int(11) NOT NULL DEFAULT 0 COMMENT '最后登录时间',
  `create_time` int(11) NOT NULL DEFAULT 0 COMMENT '创建时间',
  `update_time` int(11) NOT NULL DEFAULT 0 COMMENT '更新时间',
  `u_auth` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  PRIMARY KEY (`u_id`) USING BTREE,
  UNIQUE INDEX `u_id`(`u_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8 COLLATE = utf8_general_ci COMMENT = '用户表' ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of siam_users
-- ----------------------------
INSERT INTO `siam_users` VALUES (1, 'e10adc3949ba59abbe56e057f20f883e', 'Siam', '1001', '0', '1', 1, '0-1', '0', 0, 0, 0, '');
INSERT INTO `siam_users` VALUES (2, 'e10adc3949ba59abbe56e057f20f883e', '测试', '100083', '1', '2', 1, '0-1-2', '0', 0, 0, 0, '15');
