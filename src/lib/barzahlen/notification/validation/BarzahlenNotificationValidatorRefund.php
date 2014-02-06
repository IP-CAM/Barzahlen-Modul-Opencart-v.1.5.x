<?php

/**
 * Barzahlen Payment Module for OpenCart
 * Copyright (C) 2013 Zerebro Internet GmbH (http://www.barzahlen.de)
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program.  If not, see <http://www.gnu.org/licenses/>.
 *
 * PHP version 5
 * @category   ZerebroInternet
 * @package    ZerebroInternet_Barzahlen
 * @copyright  Copyright (C) 2013 Zerebro Internet GmbH (http://www.barzahlen.de)
 * @author     Mathias Hertlein
 * @license    http://www.gnu.org/licenses/gpl-3.0.txt GNU General Public License
 */

/**
 * Validates a refund notification request
 */
class BarzahlenNotificationValidatorRefund extends BarzahlenNotificationValidator
{
    /**
     * Validates the notification
     *
     * @param int $shopId
     * @param array $order
     * @param array $data
     * @throws BarzahlenNotificationValidatorException
     */
    public function validate($shopId, $order, $data)
    {
        parent::validate($shopId, $order, $data);

        if (!$this->isOrderIdValid($data['origin_order_id'])) {
            throw new BarzahlenNotificationValidatorException("invalid origin_order_id");
        }

        if (!$this->isTransactionIdValid($data['origin_transaction_id'])) {
            throw new BarzahlenNotificationValidatorException("invalid origin_transaction_id");
        }

        // TODO validate refund_transaction_id against refunds. order['refunds']
    }
}
