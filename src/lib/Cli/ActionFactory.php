<?php
/**
 * Created by PhpStorm.
 * User: cb0
 * Date: 12.08.17
 * Time: 12:43
 */

namespace Lisk\Cli;


use Lisk\Cli\Account\Balance;
use Lisk\Cli\Account\Delegates;
use Lisk\Cli\Account\GeneratePublicKey;
use Lisk\Cli\Account\GetPublicKey;
use Lisk\Cli\Account\Open;
use Lisk\Cli\Account\VoteDelegates;
use Lisk\Cli\Blocks\GetBlock;
use Lisk\Cli\Blocks\GetBlockchainFee;
use Lisk\Cli\Blocks\GetBlockchainFees;
use Lisk\Cli\Blocks\GetBlockchainHeight;
use Lisk\Cli\Blocks\GetBlockchainMilestone;
use Lisk\Cli\Blocks\GetBlockchainNethash;
use Lisk\Cli\Blocks\GetBlockchainReward;
use Lisk\Cli\Blocks\GetBlocks;
use Lisk\Cli\Blocks\GetStatusInfos;
use Lisk\Cli\Blocks\GetTotalSupply;
use Lisk\Cli\Delegate\CreateDelegate;
use Lisk\Cli\Delegate\GetDelegateCount;
use Lisk\Cli\Delegate\GetDelegateList;
use Lisk\Cli\Delegate\SearchDelegate;
use Lisk\Cli\Loader\BlockStatus;
use Lisk\Cli\Loader\LoadingStatus;
use Lisk\Cli\Loader\SynchronizationStatus;
use Lisk\Cli\Peer\GetPeer;
use Lisk\Cli\Peer\GetPeerList;
use Lisk\Cli\Peer\GetPeerVersion;
use Lisk\Cli\Signatures\AddSecondSignature;
use Lisk\Cli\Signatures\GetSignatureFee;
use Lisk\Cli\Transaction\GetQueuedTransaction;
use Lisk\Cli\Transaction\GetTransaction;
use Lisk\Cli\Transaction\GetUnconfirmedTransaction;
use Lisk\Cli\Transaction\ListQueuedTransactions;
use Lisk\Cli\Transaction\ListTransactions;
use Lisk\Cli\Transaction\ListUnconfirmedTransactions;
use Lisk\Cli\Transaction\SendTransaction;

class ActionFactory
{
    public function create(string $actionName)
    {
        switch ($actionName) {
            //Account
            case "info":
                return new LoadingStatus();
            case "openAccount":
                return new Open();
            case "getBalance":
                return new Balance();
            case "getPublicKey":
                return new GetPublicKey();
            case "generatePublicKey":
                return new GeneratePublicKey();
            case "getDelegates":
                return new Delegates();
            case "voteDelegates":
                return new VoteDelegates();
            //Loading
            case "getLoadingStatus":
                return new LoadingStatus();
            case "getSyncStatus":
                return new SynchronizationStatus();
            case "getBlockStatus":
                return new BlockStatus();
            //Transactions
            case "listTransactions":
                return new ListTransactions();
            case "sendTransaction":
                return new SendTransaction();
            case "getTransaction":
                return new GetTransaction();
            case "getUnconfirmedTransaction":
                return new GetUnconfirmedTransaction();
            case "listUnconfirmedTransactions":
                return new ListUnconfirmedTransactions();
            case "listQueuedTransactions":
                return new ListQueuedTransactions();
            case "getQueuedTransaction":
                return new GetQueuedTransaction();
            //Peers
            case "getPeerList":
                return new GetPeerList();
            case "getPeerVersion";
                return new GetPeerVersion();
            case "getPeer":
                return new GetPeer();
            //Blocks
            case "getBlocks":
                return new GetBlocks();
            case "getBlock":
                return new GetBlock();
            case "getBlockchainFee":
                return new GetBlockchainFee();
            case "getBlockchainFees":
                return new GetBlockchainFees();
            case "getBlockchainReward":
                return new GetBlockchainReward();
            case "getTotalSupply":
                return new GetTotalSupply();
            case "getBlockchainHeight":
                return new GetBlockchainHeight();
            case "getStatusInfos":
                return new GetStatusInfos();
            case "getBlockchainNethash":
                return new GetBlockchainNethash();
            case "getBlockchainMilestone":
                return new GetBlockchainMilestone();
            //Signatures
            case "getSignatureFee":
                return new GetSignatureFee();
            case "addSecondSignature":
                return new AddSecondSignature();
            //Delegate
            case "createDelegate":
                return new CreateDelegate();
            case "getDelegateList":
                return new GetDelegateList();
            case "searchDelegate";
                return new SearchDelegate();
            case "getDelegateCount":
                return new GetDelegateCount();
            default:
                throw new \Exception(sprintf("Action '%s' not implemented", $actionName));
        }
    }
}