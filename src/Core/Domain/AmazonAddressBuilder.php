<?php
/**
 * Copyright 2016 Amazon.com, Inc. or its affiliates. All Rights Reserved.
 *
 * Licensed under the Apache License, Version 2.0 (the "License").
 * You may not use this file except in compliance with the License.
 * A copy of the License is located at
 *
 *  http://aws.amazon.com/apache2.0
 *
 * or in the "license" file accompanying this file. This file is distributed
 * on an "AS IS" BASIS, WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either
 * express or implied. See the License for the specific language governing
 * permissions and limitations under the License.
 */
namespace Amazon\Core\Domain;

use Amazon\Core\Api\Data\AmazonAddressInterface;
use Magento\Framework\Api\DataObjectHelper;

/**
 * Class Builder
 */
class AmazonAddressBuilder
{
    /**
     * @var array
     */
    private $data = [];

    /**
     * @param DataObjectHelper $dataObjectHelper
     */
    public function __construct(
        DataObjectHelper $dataObjectHelper
    ) {
        $this->dataObjectHelper = $dataObjectHelper;
    }

    /**
     * @param array $data
     * @return $this
     */
    public function setData(array $data)
    {
        $this->data = $data;
        return $this;
    }

    /**
     * @param array $address Unmodified Amazon address array
     * @param array $lines
     * @return $this
     * @SuppressWarnings(PHPMD.UnusedFormalParameter)
     */
    public function setAddress(array $address, array $lines)
    {
        // Modify address data if needed
        return $this;
    }

    /**
     * @param AmazonAddress $amazonAddress
     * @return AmazonAddress
     */
    public function build(AmazonAddressInterface $amazonAddress)
    {
        $amazonAddress->setLines($this->data['lines']);
        unset($this->data['lines']);

        $this->dataObjectHelper->populateWithArray(
            $amazonAddress,
            $this->data,
            AmazonAddressInterface::class
        );

        return $amazonAddress;
    }
}
