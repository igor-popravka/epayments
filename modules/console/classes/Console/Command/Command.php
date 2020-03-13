<?php

namespace Console\Command;

use Console\Exception\ConsoleException;
use Console\Exception\CommandException;
use Console\Exception\ArgumentException;

class Command
{
    private $name;

    private $aliases = [];

    private $usages = [];

    private $help = '';

    private $description = '';

    /**
     * Command constructor.
     *
     * @param string|null $name
     *
     * @throws ConsoleException
     */
    public function __construct(string $name = null)
    {
        if (null !== $name) {
            $this->setName($name);
        }

        $this->configure();
    }

    /**
     * Sets the name of the command.
     *
     * This method can set both the namespace and the name if
     * you separate them by a colon (:)
     *
     *     $command->setName('foo:bar');
     *
     * @param string $name The command name
     *
     * @return $this
     *
     * @throws ConsoleException
     */
    public function setName($name)
    {
        $this->validateName($name);

        $this->name = $name;

        return $this;
    }

    /**
     * Returns the command name.
     *
     * @return string|null
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Sets the aliases for the command.
     *
     * @param string[] $aliases An array of aliases for the command
     *
     * @return $this
     *
     * @throws ConsoleException
     */
    public function setAliases($aliases)
    {
        if (!\is_array($aliases) && !$aliases instanceof \Traversable) {
            throw ArgumentException::create('$aliases must be an array or an instance of \Traversable');
        }

        foreach ($aliases as $alias) {
            $this->validateName($alias);
        }

        $this->aliases = $aliases;

        return $this;
    }

    /**
     * Returns the aliases for the command.
     *
     * @return array An array of aliases for the command
     */
    public function getAliases()
    {
        return $this->aliases;
    }

    /**
     * Add a command usage example.
     *
     * @param string $usage The usage, it'll be prefixed with the command name
     *
     * @return $this
     */
    public function addUsage($usage)
    {
        if (0 !== strpos($usage, $this->name)) {
            $usage = sprintf('%s %s', $this->name, $usage);
        }

        $this->usages[] = $usage;

        return $this;
    }

    /**
     * Returns alternative usages of the command.
     *
     * @return array
     */
    public function getUsages()
    {
        return $this->usages;
    }

    /**
     * Sets the help for the command.
     *
     * @param string $help The help for the command
     *
     * @return $this
     */
    public function setHelp($help)
    {
        $this->help = $help;

        return $this;
    }

    /**
     * Returns the help for the command.
     *
     * @return string The help for the command
     */
    public function getHelp()
    {
        return $this->help;
    }

    /**
     * Sets the description for the command.
     *
     * @param string $description The description for the command
     *
     * @return $this
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Returns the description for the command.
     *
     * @return string The description for the command
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Configures the current command.
     */
    protected function configure()
    {
    }

    /**
     * Execute command
     *
     * @throws ConsoleException
     * @author Igor Popravka <igor.popravka@tstechpro.com>
     */
    protected function execute()
    {
        throw CommandException::create('You must override the execute() method in the concrete command class.');
    }

    /**
     * @param string $name
     *
     * @throws ConsoleException
     * @author Igor Popravka <igor.popravka@tstechpro.com>
     */
    private function validateName(string $name)
    {
        if (!preg_match('/^[^\:]++(\:[^\:]++)*$/', $name)) {
            throw ArgumentException::create(sprintf('Command name "%s" is invalid.', $name));
        }
    }
}
