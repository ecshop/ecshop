# ECSHOP 代码优化待办事项

## 一、安全漏洞修复 (Critical)

### 1.1 SQL 注入漏洞修复

- [x] **goods.php:234** - 修复 `$_REQUEST[id]` 直接用于 SQL 的问题，改用参数化查询
- [x] **admin/user_msg.php:263** - 修复 `$_GET[id]` SQL 注入
- [x] **admin/articlecat.php:216** - 修复 `$_POST[id]` SQL 注入
- [x] **admin/shipping.php:72,298** - 修复 `$_GET[code]` 和 `$_POST[config_lable]` SQL 注入
- [x] **admin/shipping_area.php:275** - 修复 `$_POST[id]` SQL 注入
- [x] **admin/template.php:197** - 修复 `$_POST[template_file]` SQL 注入
- [x] **admin/wholesale.php:400** - 修复 `$_POST[id]` SQL 注入
- [x] **admin/vote.php:87,125,149** - 修复 `$_POST[vote_name]`, `$_REQUEST[id]` SQL 注入
- [x] **admin/exchange_goods.php:131** - 修复 `$_REQUEST[id]` SQL 注入
- [x] **admin/virtual_card.php** - 修复多处 `$_POST[goods_id]`, `$_POST[card_id]`, `$_REQUEST[goods_id]` SQL 注入

### 1.2 XSS 跨站脚本修复

- [x] **category.php:33** - htmlspecialchars 添加 ENT_QUOTES 参数
- [x] **article_cat.php:84** - 修复 $_REQUEST[keywords] XSS 风险
- [x] **affiche.php:78** - 修复 $_GET[from] XSS
- [x] **search.php:73,85,97,98,100,361** - 修复多处 keywords XSS
- [x] **wholesale.php:288** - 修复 $_POST[remark] XSS

### 1.3 不安全函数修复

- [x] **cls_template.php:1147** - 移除 extract($params)，改用安全的方式传递变量
- [x] **lib_common.php:1183** - 移除 extract() 使用，改为直接访问数组
- [x] **lib_common.php:1243** - 移除 extract() 使用，改为直接访问数组
- [x] **lib_common.php:148,169,473,1026,2028** - unserialize 添加 ['allowed_classes' => false]
- [x] **search.php:18** - unserialize 添加 ['allowed_classes' => false]
- [x] **wholesale.php:104,415,417** - unserialize 添加 ['allowed_classes' => false]
- [ ] **cls_template.php:126,139,217,565,748,962,965** - eval() 为模板引擎核心功能，暂不修改

---

## 二、性能优化 (High)

### 2.1 优化 LIKE 查询

- [x] **search.php:149-152** - 优化 LIKE '%...%' 改为前缀匹配
- [x] **wholesale.php:41-42** - 优化搜索查询，改为前缀匹配
- [x] **admin/order.php:4139-4157** - 优化订单搜索，部分字段改为精确匹配
- [x] **quotation.php:70** - 优化为前缀匹配和精确匹配
- [x] **admin/attention_list.php:134** - 优化为前缀匹配
- [x] **admin/user_msg.php:286** - 优化为前缀匹配
- [x] **admin/bonus.php:668** - 优化为前缀匹配和精确匹配
- [x] **admin/group_buy.php:626** - 优化为前缀匹配
- [x] **admin/auction.php:404** - 优化为前缀匹配

### 2.2 解决 N+1 查询

- [x] **lib_goods.php:821-824** - 经核实为字符串处理，非数据库查询
- [ ] **user.php:1693** - 会员推荐层级查询，需优化数据库结构（添加 nested set 或 path 字段）
- [ ] **admin/users.php:270,546** - 同上，层级遍历查询优化

> 注：层级查询优化需要数据库结构支持，建议后续添加 parent_path 字段存储完整路径

### 2.3 内存限制调整

- [ ] **init.php:20** - 调整 memory_limit 至合理值（如 256M）
- [ ] **admin/includes/init.php:16** - 调整内存限制
- [ ] **api/init.php:15** - 调整内存限制

---

## 三、代码质量提升 (Medium)

### 3.1 添加类型声明

#### 核心类添加返回类型
- [ ] **cls_mysql.php** - 为所有方法添加返回类型
- [ ] **cls_template.php** - 为所有方法添加返回类型
- [ ] **cls_session.php** - 为所有方法添加返回类型

#### 核心函数库添加类型
- [ ] **lib_common.php** - 为关键函数添加类型声明 (db_create_in, get_categories_tree 等)
- [ ] **lib_goods.php** - 为关键函数添加类型声明
- [ ] **lib_order.php** - 为关键函数添加类型声明

### 3.2 消除全局变量依赖

- [ ] **lib_common.php** - 逐步移除 $GLOBALS 使用，改为依赖注入
- [ ] **cls_mysql.php** - 改进数据库连接管理

### 3.3 消除代码重复

- [ ] **lib_common.php:336-354 与 1665-1683** - 提取公共的层级计算逻辑为独立函数

---

## 四、架构改进 (Low)

### 4.1 代码规范化

- [ ] 统一代码风格（缩进、命名、注释）
- [ ] 遵循 PSR-12 代码风格规范

### 4.2 CSRF 防护

- [ ] admin 表单添加 CSRF token 验证
- [ ] 改进 admin/database.php 的 token 验证逻辑

### 4.3 移除硬编码

- [ ] **cls_mysql.php:19** - max_cache_time 改为可配置
- [ ] **cls_mysql.php:21** - cache_data_dir 改为可配置

### 4.4 安全随机数

- [ ] **cls_session.php** - 使用 random_bytes() 替代 mt_rand() 生成 session ID

---

## 五、现代化改造 (长期)

- [ ] 引入命名空间
- [ ] 实现 PSR-4 自动加载
- [ ] 引入依赖注入容器
- [ ] 实现 Repository 模式
- [ ] 添加缓存层 (PSR-6)
- [ ] 添加日志层 (PSR-3)

---

## 修复优先级

```
P0 (立即修复):
  - SQL 注入漏洞 (7处)
  - XSS 漏洞 (4处)
  - eval() 代码执行风险

P1 (高优先级):
  - N+1 查询优化
  - LIKE 查询优化
  - 内存限制调整

P2 (中优先级):
  - 类型声明添加
  - 全局变量消除
  - 代码重复消除

P3 (低优先级):
  - CSRF 防护
  - 架构现代化
```
