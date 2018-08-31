<?php

namespace ImportFrame\Persistence;

use Exception;
use ImportFrame\Data\IData;
use ImportFrame\Exception\IException;

/**
 * abstract Class Persistence
 *
 * Abstract stub for the main logic
 *
 * @author MishaK<mixapiy@yandex.ru>
 * @version 1.0
 * @package ImportFrame
 */
abstract class Persistence implements IPersistence
{
    /**
     * Variable for save result run @see run()
     * @see Persistence::doRun()
     * @access protected
     * @var IData
     */
    protected $runResult;

    /**
     * Context variable
     * @see Persistence::run()
     * @access protected
     * @var IData
     */
    protected $context;

    /**
     * Getting runResult property
     * @uses Persistence::$runResult for return result
     * @return IData
     */
    public function getResult()
    {
        return $this->runResult;
    }

    /**
     * Setting runResult property
     * @uses Persistence::$runResult to place param data
     * @param IData $runResult
     */
    protected function setRunResult(IData $runResult)
    {
        $this->runResult = $runResult;
    }

    /**
     * Getting context property
     * @uses Persistence::$context for return result
     * @return IData
     */
    public function getContext()
    {
        return $this->context;
    }

    /**
     * Setting context property
     * @uses Persistence::$context to place param data
     * @param IData $context
     */
    protected function setContext(IData $context)
    {
        $this->context = $context;
    }

    /**
     * Basic work logic
     * @param IData $context
     * @return IData
     * @return void
     * @throws PersistenceException
     */
    public function run(IData $context)
    {
        $this->setContext($context);
        try {
            $this->beforeRun();
            $this->doRun();
            $this->afterRun();
            return $this->getResult();
        } catch (IException $exception) {
            throw new PersistenceException('', PersistenceException::ERROR_RUN, $exception);
        } catch (Exception $exception) {
            throw new PersistenceException($exception->getMessage(), PersistenceException::ERROR_UNKNOWN);
        }
    }

    /**
     * Method for overrides
     * @todo To implement some logic after executing the main logic
     */
    protected function afterRun()
    {
    }

    /**
     * Method for overrides
     * @todo To implement some logic before executing the main logic
     */
    protected function beforeRun()
    {
    }

    /**
     * Method implementation is designed to execute logic
     * @abstract
     * @access protected
     * @throws IException
     */
    abstract protected function doRun();
}