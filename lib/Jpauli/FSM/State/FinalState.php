<?php
/*
 * Copyright (c) 2006-2008, 2011 KUBO Atsuhiro <kubo@iteman.jp>,
 * Copyright 2012 PAULI Julien <jpauli@php.net>
 * All rights reserved.
 *
 * Redistribution and use in source and binary forms, with or without
 * modification, are permitted provided that the following conditions are met:
 *
 * * Redistributions of source code must retain the above copyright
 * notice, this list of conditions and the following disclaimer.
 * * Redistributions in binary form must reproduce the above copyright
 * notice, this list of conditions and the following disclaimer in the
 * documentation and/or other materials provided with the distribution.
 *
 * THIS SOFTWARE IS PROVIDED BY THE COPYRIGHT HOLDERS AND CONTRIBUTORS "AS IS"
 * AND ANY EXPRESS OR IMPLIED WARRANTIES, INCLUDING, BUT NOT LIMITED TO, THE
 * IMPLIED WARRANTIES OF MERCHANTABILITY AND FITNESS FOR A PARTICULAR PURPOSE
 * ARE DISCLAIMED. IN NO EVENT SHALL THE COPYRIGHT OWNER OR CONTRIBUTORS BE
 * LIABLE FOR ANY DIRECT, INDIRECT, INCIDENTAL, SPECIAL, EXEMPLARY, OR
 * CONSEQUENTIAL DAMAGES (INCLUDING, BUT NOT LIMITED TO, PROCUREMENT OF
 * SUBSTITUTE GOODS OR SERVICES; LOSS OF USE, DATA, OR PROFITS; OR BUSINESS
 * INTERRUPTION) HOWEVER CAUSED AND ON ANY THEORY OF LIABILITY, WHETHER IN
 * CONTRACT, STRICT LIABILITY, OR TORT (INCLUDING NEGLIGENCE OR OTHERWISE)
 * ARISING IN ANY WAY OUT OF THE USE OF THIS SOFTWARE, EVEN IF ADVISED OF THE
 * POSSIBILITY OF SUCH DAMAGE.
 */
namespace Jpauli\FSM\State;

use Jpauli\FSM\Event\Event;
use Jpauli\FSM\Exception\LogicalException;

/**
 * Final state. Can't contain any Event
 *
 * @copyright  2006-2008, 2011 KUBO Atsuhiro <kubo@iteman.jp>
 * @copyright  2012 PAULI Julien <jpauli@php.net>
 * @license    http://www.opensource.org/licenses/bsd-license.php  BSD License (revised)
 */
class FinalState extends AbstractState
{
    /**
     * @var string
     */
    const DEFAULT_NAME = "DEFAULT_FINAL_STATE";

    /**
     * @param string $name
     */
    public function __construct($name = self::DEFAULT_NAME)
    {
        $this->name = $name;
    }

    /**
     * FinalState has no event
     *
     * @param string $event
     * @throws \Jpauli\FSM\Exception\LogicalException
     */
    final public function getEvent($event)
    {
        throw new LogicalException("FinalState have no event, $event cant exist");
    }

    /**
     * @see Jpauli\FSM\State\IState::getType()
     */
    final public function getType()
    {
        return IState::STATE_FINAL;
    }

    /**
     * Adds the event with the given name.
     *
     * @param \Jpauli\FSM\Event\Event $event
     * @throws \Jpauli\FSM\Exception\LogicalException
     */
    final public function addEvent(Event $event)
    {
        throw new LogicalException("FinalState cant have any event");
    }

    /**
     * A FinalState has no Event
     *
     * @param string $name
     * @return boolean
     */
    final public function hasEvent($name)
    {
        return false;
    }
}
