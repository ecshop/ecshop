<?php

namespace App\Service\Goods\Brand;

/**
 * 品牌
 * Class BrandService
 * @package App\Service\Goods\Brand
 */
class BrandService
{
    /**
     * 查询品牌
     * @return array
     */
    public function search(): array
    {
        return [];
    }

    /**
     * 创建品牌
     * @param BrandRequest $brandRequest
     * @return bool
     */
    public function create(BrandRequest $brandRequest): bool
    {
        return isset($brandRequest);
    }

    /**
     * 获取品牌
     * @param int $id
     * @return BrandResponse
     */
    public function detail(int $id): BrandResponse
    {
        return new BrandResponse();
    }

    /**
     * 更新品牌
     * @param BrandRequest $brandRequest
     * @return bool
     */
    public function update(BrandRequest $brandRequest): bool
    {
        return isset($brandRequest);
    }

    /**
     * 删除品牌
     * @param int $id
     * @return bool
     */
    public function destroy(int $id): bool
    {
        return isset($id);
    }
}
