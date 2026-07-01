<?php
declare(strict_types=1);
namespace GiocoPlus\Transaction\Contract;
/**
 * 交易
 */
interface TransactionServiceInterface {

    /**
     * 錢包餘額
     * @param string $account_with_op
     * @param string $delimiter
     * @param string $wallet_code
     * @return array
     */
    function getBalance(string $account_with_op, string $delimiter, string $wallet_code): array;

    /**
     * 錢包餘額(給Vendor)
     * @param string $account_with_op
     * @param string $delimiter
     * @param string $wallet_code
     * @return array
     */
    function getBalanceForVendor(string $account_with_op, string $delimiter, string $wallet_code): array;

    /**
     * 上分
     * @param string $account_with_op
     * @param string $wallet_code
     * @param float $amount
     * @param string $trace_id
     * @return array
     */
    function opTransferIn(string $account_with_op, string $delimiter, string $wallet_code, float $amount, string $trace_id): array;

    /**
     * 下分
     * @param string $account_with_op
     * @param string $wallet_code
     * @param float $amount
     * @param string $trace_id
     * @return array
     */
    function opTransferOut(string $account_with_op, string $delimiter, string $wallet_code, float $amount, string $trace_id): array;

    /**
     * 遊戲上分
     * @param string $account_with_op
     * @param string $delimiter
     * @param string $wallet_code
     * @param float $amount
     * @param string $trace_id
     * @param string $bet_id
     * @return array
     */
    function gameTransferIn(string $account_with_op, string $delimiter, string $wallet_code, float $amount, string $trace_id, string $bet_id): array;

    /**
     * 遊戲下分
     * @param string $account_with_op
     * @param string $delimiter
     * @param string $wallet_code
     * @param float $amount
     * @param string $trace_id
     * @param string $bet_id
     * @return array
     */
    function gameTransferOut(string $account_with_op, string $delimiter, string $wallet_code, float $amount, string $trace_id, string $bet_id): array;

    /**
     * 下注
     * @param string $account_with_op
     * @param string $delimiter
     * @param string $wallet_code
     * @param float $amount
     * @param string $trace_id
     * @param string $bet_id
     * @param bool $allow_balance_minus
     * @return array
     */
    function gameStake(string $account_with_op, string $delimiter, string $wallet_code, float $amount, string $trace_id, string $bet_id, bool $allow_balance_minus = false): array;

    /**
     * 下注(帶投注紀錄)
     *
     * @param string $account_with_op
     * @param string $delimiter
     * @param string $wallet_code
     * @param float $amount
     * @param array $betlog
     * @param boolean $allow_balance_minus
     * @return array
     */
    function gameStakeWithBetlog(string $account_with_op, string $delimiter, string $wallet_code, float $amount, string $trace_id, string $bet_id, array $betlog, bool $allow_balance_minus = false): array;

    /**
     * 派彩
     *
     * @param string $account_with_op
     * @param string $delimiter
     * @param string $wallet_code
     * @param float $amount
     * @param string $trace_id
     * @param string $bet_id
     * @param bool $check_stake
     * @return array
     */
    function gamePayoff(string $account_with_op, string $delimiter, string $wallet_code, float $amount, string $trace_id, string $bet_id, bool $check_stake = true): array;

    /**
     * 派彩(帶投注紀錄)
     *
     * @param string $account_with_op
     * @param string $delimiter
     * @param string $wallet_code
     * @param float $amount
     * @param string $trace_id
     * @param string $bet_id
     * @param array $betlog
     * @param boolean $check_stake
     * @return array
     */
    function gamePayoffWithBetlog(string $account_with_op, string $delimiter, string $wallet_code, float $amount, string $trace_id, string $bet_id, array $betlog, bool $check_stake = true): array;

    /**
     * 取消下注
     *
     * @param string $account_with_op
     * @param string $wallet_code
     * @param float $amount
     * @param string $trace_id
     * @param string $bet_id
     * @return array
     */
    function cancelStake(string $account_with_op, string $delimiter, string $wallet_code, float $amount, string $trace_id, string $bet_id, bool $check_stake = true): array;

    /**
     * 取消下注(帶投注紀錄)
     *
     * @param string $account_with_op
     * @param string $delimiter
     * @param string $wallet_code
     * @param float $amount
     * @param string $trace_id
     * @param string $bet_id
     * @param array $betlog
     * @param boolean $check_stake
     * @return array
     */
    function cancelStakeWithBetlog(string $account_with_op, string $delimiter, string $wallet_code, float $amount, string $trace_id, string $bet_id, array $betlog, bool $check_stake = true): array;

    /**
     * 取消派彩
     *
     * @param string $account_with_op
     * @param string $wallet_code
     * @param float $amount
     * @param string $trace_id
     * @param string $bet_id
     * @return array
     */
    function cancelPayoff(string $account_with_op, string $delimiter, string $wallet_code, float $amount, string $trace_id, string $bet_id): array;

    /**
     * 取消派彩(帶投注紀錄)
     *
     * @param string $account_with_op
     * @param string $delimiter
     * @param string $wallet_code
     * @param float $amount
     * @param string $trace_id
     * @param string $bet_id
     * @param array $betlog
     * @return array
     */
    function cancelPayoffWithBetlog(string $account_with_op, string $delimiter, string $wallet_code, float $amount, string $trace_id, string $bet_id, array $betlog): array;

    /**
     * 下注、派彩（帶投注紀錄）
     *
     * @param string $account_with_op
     * @param string $delimiter
     * @param string $wallet_code
     * @param $stake
     * @param $payoff
     * @param bool $check_stake
     * @return array
     */
    function stakePayoffWithBetlog(string $account_with_op, string $delimiter, string $wallet_code, $stake, $payoff, bool $check_stake = true): array;

    /**
     * 下注、取消下注（帶投注紀錄）
     *
     * @param string $account_with_op
     * @param string $delimiter
     * @param string $wallet_code
     * @param $stake
     * @param $cancel_stake
     * @param bool $check_stake
     * @return array
     */
    function stakeCancelStakeWithBetlog(string $account_with_op, string $delimiter, string $wallet_code, $stake, $cancel_stake, bool $check_stake = true): array;

    /**
     * 取消派彩、取消下注（帶投注紀錄）
     *
     * @param string $account_with_op
     * @param string $delimiter
     * @param string $wallet_code
     * @param $cancel_payoff
     * @param $cancel_stake
     * @param bool $check_stake
     * @return array
     */
    function cancelPayoffCancelStakeWithBetlog(string $account_with_op, string $delimiter, string $wallet_code, $cancel_payoff, $cancel_stake, bool $check_stake = true): array;

    /**
     * 取消派彩、派彩（帶投注紀錄）
     *
     * @param string $account_with_op
     * @param string $delimiter
     * @param string $wallet_code
     * @param $cancel_payoff
     * @param $payoff
     * @param bool $check_stake
     * @return array
     */
    function cancelPayoffPayoffWithBetlog(string $account_with_op, string $delimiter, string $wallet_code, $cancel_payoff, $payoff, bool $check_stake = true): array;

    /**
     * 調整資金
     * @param string $account_with_op
     * @param string $wallet_code
     * @param float $amount
     * @param string $trace_id
     * @param string $memo
     * @return array
     */
    function adjust(string $account_with_op, string $delimiter, string $wallet_code, float $amount, string $trace_id, string $memo): array;

    /**
     * 查詢訂單
     * @param string $account_with_op
     * @param string $delimiter
     * @param string $trace_id
     * @param string|null $wallet_code 選填，錢包代碼
     * @return array
     */
    function queryOrder(string $account_with_op, string $delimiter, string $trace_id, string $wallet_code = null): array;

    /**
     * 依 traceId 前綴的日期資訊查詢對應的分區交易紀錄
     *
     * 與 queryOrder 的差異在於本函式會先從 traceId 解析出 ISO 週數，
     * 並據此決定要查詢的 partitioned table（例如 transactions_202301），
     * 若無法解析則 fallback 至預設的 transactions 表。
     *
     * @param string      $account_with_op
     * @param string      $delimiter
     * @param string      $trace_id        交易唯一識別碼
     *
     * @return array ApiResponse 格式的陣列，包含交易資料或對應的錯誤狀態碼
     */
    function queryOrderPartition(string $account_with_op, string $delimiter, string $trace_id): array;

    /**
     * 幣值換算
     * @param string $account_with_op
     * @param string $delimiter
     * @param string $wallet_code
     * @param float $amount
     * @param string $operator
     * @return mixed
     */
    function exchangeRate(string $account_with_op, string $delimiter, string $wallet_code, float $amount, string $operator);
    
    /**
     * 遊戲商交易逾時
     * @param array $orderData
     * @return mixed
    */
    function vendorTimeoutLog(array $orderData);

}

