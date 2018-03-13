<?php
// source: C:\MAMP\htdocs\Juno\app/Core/config/config.local.development.neon 
// source: C:\MAMP\htdocs\Juno\app/Core/config/config.neon 

class Container_b2c4047df2 extends Nette\DI\Container
{
	protected $meta = [
		'types' => [
			'Nette\Application\Application' => [1 => ['application.application']],
			'Nette\Application\IPresenterFactory' => [1 => ['application.presenterFactory']],
			'Nette\Application\LinkGenerator' => [1 => ['application.linkGenerator']],
			'Nette\Caching\Storages\IJournal' => [1 => ['cache.journal']],
			'Nette\Caching\IStorage' => [1 => ['cache.storage']],
			'Nette\Database\Connection' => [1 => ['database.default.connection']],
			'Nette\Database\IStructure' => [1 => ['database.default.structure']],
			'Nette\Database\Structure' => [1 => ['database.default.structure']],
			'Nette\Database\IConventions' => [1 => ['database.default.conventions']],
			'Nette\Database\Conventions\DiscoveredConventions' => [1 => ['database.default.conventions']],
			'Nette\Database\Context' => [1 => ['database.default.context']],
			'Nette\Http\RequestFactory' => [1 => ['http.requestFactory']],
			'Nette\Http\IRequest' => [1 => ['http.request']],
			'Nette\Http\Request' => [1 => ['http.request']],
			'Nette\Http\IResponse' => [1 => ['http.response']],
			'Nette\Http\Response' => [1 => ['http.response']],
			'Nette\Http\Context' => [1 => ['http.context']],
			'Nette\Bridges\ApplicationLatte\ILatteFactory' => [1 => ['latte.latteFactory']],
			'Nette\Application\UI\ITemplateFactory' => [1 => ['latte.templateFactory']],
			'Nette\Mail\IMailer' => [1 => ['mail.mailer']],
			'Nette\Application\IRouter' => [1 => ['routing.router']],
			'Nette\Security\IUserStorage' => [1 => ['security.userStorage']],
			'Nette\Security\User' => [1 => ['security.user']],
			'UserModule\Services\User' => [1 => ['security.user']],
			'Nette\Http\Session' => [1 => ['session.session']],
			'Tracy\ILogger' => [1 => ['tracy.logger']],
			'Tracy\BlueScreen' => [1 => ['tracy.blueScreen']],
			'Tracy\Bar' => [1 => ['tracy.bar']],
			'Symfony\Component\Translation\Translator' => [1 => ['translation.default']],
			'Symfony\Component\Translation\TranslatorBagInterface' => [1 => ['translation.default']],
			'Symfony\Component\Translation\TranslatorInterface' => [1 => ['translation.default']],
			'Kdyby\Translation\ITranslator' => [1 => ['translation.default']],
			'Nette\Localization\ITranslator' => [1 => ['translation.default']],
			'Kdyby\Translation\Translator' => [1 => ['translation.default']],
			'Kdyby\Translation\CatalogueCompiler' => [1 => ['translation.catalogueCompiler']],
			'Tracy\IBarPanel' => [
				1 => ['translation.panel'],
				0 => ['doctrine.default.diagnosticsPanel'],
			],
			'Kdyby\Translation\Diagnostics\Panel' => [1 => ['translation.panel']],
			'Kdyby\Translation\IUserLocaleResolver' => [
				['translation.userLocaleResolver.param'],
				[
					'translation.userLocaleResolver.acceptHeader',
					'translation.userLocaleResolver.session',
					'translation.userLocaleResolver',
				],
			],
			'Kdyby\Translation\LocaleResolver\LocaleParamResolver' => [['translation.userLocaleResolver.param']],
			'Kdyby\Translation\LocaleResolver\AcceptHeaderResolver' => [1 => ['translation.userLocaleResolver.acceptHeader']],
			'Kdyby\Translation\LocaleResolver\SessionResolver' => [1 => ['translation.userLocaleResolver.session']],
			'Kdyby\Translation\TemplateHelpers' => [1 => ['translation.helpers']],
			'Kdyby\Translation\FallbackResolver' => [1 => ['translation.fallbackResolver']],
			'Kdyby\Translation\CatalogueFactory' => [1 => ['translation.catalogueFactory']],
			'Symfony\Component\Translation\MessageSelector' => [1 => ['translation.selector']],
			'Symfony\Component\Translation\Formatter\MessageFormatterInterface' => [1 => ['translation.formatter']],
			'Symfony\Component\Translation\Formatter\ChoiceMessageFormatterInterface' => [1 => ['translation.formatter']],
			'Symfony\Component\Translation\Formatter\MessageFormatter' => [1 => ['translation.formatter']],
			'Symfony\Component\Translation\Extractor\ExtractorInterface' => [1 => ['translation.extractor'], 0 => ['translation.extractor.latte']],
			'Symfony\Component\Translation\Extractor\ChainExtractor' => [1 => ['translation.extractor']],
			'Kdyby\Translation\Extractors\LatteExtractor' => [['translation.extractor.latte']],
			'Symfony\Component\Translation\Writer\TranslationWriterInterface' => [1 => ['translation.writer']],
			'Symfony\Component\Translation\Writer\TranslationWriter' => [1 => ['translation.writer']],
			'Symfony\Component\Translation\Dumper\FileDumper' => [
				[
					'translation.dumper.php',
					'translation.dumper.xliff',
					'translation.dumper.po',
					'translation.dumper.mo',
					'translation.dumper.yml',
					'translation.dumper.neon',
					'translation.dumper.qt',
					'translation.dumper.csv',
					'translation.dumper.ini',
					'translation.dumper.res',
				],
			],
			'Symfony\Component\Translation\Dumper\DumperInterface' => [
				[
					'translation.dumper.php',
					'translation.dumper.xliff',
					'translation.dumper.po',
					'translation.dumper.mo',
					'translation.dumper.yml',
					'translation.dumper.neon',
					'translation.dumper.qt',
					'translation.dumper.csv',
					'translation.dumper.ini',
					'translation.dumper.res',
				],
			],
			'Symfony\Component\Translation\Dumper\PhpFileDumper' => [['translation.dumper.php']],
			'Symfony\Component\Translation\Dumper\XliffFileDumper' => [['translation.dumper.xliff']],
			'Symfony\Component\Translation\Dumper\PoFileDumper' => [['translation.dumper.po']],
			'Symfony\Component\Translation\Dumper\MoFileDumper' => [['translation.dumper.mo']],
			'Symfony\Component\Translation\Dumper\YamlFileDumper' => [['translation.dumper.yml']],
			'Kdyby\Translation\Dumper\NeonFileDumper' => [['translation.dumper.neon']],
			'Symfony\Component\Translation\Dumper\QtFileDumper' => [['translation.dumper.qt']],
			'Symfony\Component\Translation\Dumper\CsvFileDumper' => [['translation.dumper.csv']],
			'Symfony\Component\Translation\Dumper\IniFileDumper' => [['translation.dumper.ini']],
			'Symfony\Component\Translation\Dumper\IcuResFileDumper' => [['translation.dumper.res']],
			'Kdyby\Translation\IResourceLoader' => [1 => ['translation.loader']],
			'Kdyby\Translation\TranslationLoader' => [1 => ['translation.loader']],
			'Symfony\Component\Translation\Loader\LoaderInterface' => [
				[
					'translation.loader.array',
					'translation.loader.php',
					'translation.loader.yml',
					'translation.loader.xlf',
					'translation.loader.po',
					'translation.loader.mo',
					'translation.loader.ts',
					'translation.loader.csv',
					'translation.loader.res',
					'translation.loader.dat',
					'translation.loader.ini',
					'translation.loader.json',
					'translation.loader.neon',
				],
			],
			'Symfony\Component\Translation\Loader\ArrayLoader' => [
				[
					'translation.loader.array',
					'translation.loader.php',
					'translation.loader.yml',
					'translation.loader.po',
					'translation.loader.mo',
					'translation.loader.csv',
					'translation.loader.ini',
					'translation.loader.json',
					'translation.loader.neon',
				],
			],
			'Symfony\Component\Translation\Loader\FileLoader' => [
				[
					'translation.loader.php',
					'translation.loader.yml',
					'translation.loader.po',
					'translation.loader.mo',
					'translation.loader.csv',
					'translation.loader.ini',
					'translation.loader.json',
				],
			],
			'Symfony\Component\Translation\Loader\PhpFileLoader' => [['translation.loader.php']],
			'Symfony\Component\Translation\Loader\YamlFileLoader' => [['translation.loader.yml']],
			'Symfony\Component\Translation\Loader\XliffFileLoader' => [['translation.loader.xlf']],
			'Symfony\Component\Translation\Loader\PoFileLoader' => [['translation.loader.po']],
			'Symfony\Component\Translation\Loader\MoFileLoader' => [['translation.loader.mo']],
			'Symfony\Component\Translation\Loader\QtFileLoader' => [['translation.loader.ts']],
			'Symfony\Component\Translation\Loader\CsvFileLoader' => [['translation.loader.csv']],
			'Symfony\Component\Translation\Loader\IcuResFileLoader' => [['translation.loader.res', 'translation.loader.dat']],
			'Symfony\Component\Translation\Loader\IcuDatFileLoader' => [['translation.loader.dat']],
			'Symfony\Component\Translation\Loader\IniFileLoader' => [['translation.loader.ini']],
			'Symfony\Component\Translation\Loader\JsonFileLoader' => [['translation.loader.json']],
			'Kdyby\Translation\Loader\NeonFileLoader' => [['translation.loader.neon']],
			'Symfony\Component\Console\Command\Command' => [
				1 => [
					'translation.console.extract',
					'doctrine.cli.0',
					'doctrine.cli.1',
					'doctrine.cli.2',
					'doctrine.cli.3',
					'doctrine.cli.4',
					'doctrine.cli.5',
					'doctrine.cli.6',
					'doctrine.cli.7',
					'doctrine.cli.8',
					'doctrine.cli.9',
					'doctrine.cli.10',
					'doctrine.cli.11',
					'doctrine.cli.12',
					'doctrine.cli.13',
					'doctrine.cli.14',
					'doctrine.cli.15',
					'doctrine.cli.16',
				],
			],
			'Kdyby\Translation\Console\ExtractCommand' => [1 => ['translation.console.extract']],
			'IteratorAggregate' => [1 => ['console.helperSet']],
			'Traversable' => [1 => ['console.helperSet']],
			'Symfony\Component\Console\Helper\HelperSet' => [1 => ['console.helperSet']],
			'Symfony\Component\Console\Application' => [1 => ['console.application']],
			'Kdyby\Console\Application' => [1 => ['console.application']],
			'Kdyby\Events\EventManager' => [1 => ['events.manager'], 0 => ['doctrine.default.evm']],
			'Doctrine\Common\EventManager' => [1 => ['events.manager'], 0 => ['doctrine.default.evm']],
			'Kdyby\Events\LazyEventManager' => [1 => ['events.manager']],
			'Doctrine\Common\Annotations\Reader' => [['annotations.reflectionReader'], ['annotations.reader']],
			'Doctrine\Common\Annotations\AnnotationReader' => [['annotations.reflectionReader']],
			'Doctrine\Common\Cache\Cache' => [
				[
					'annotations.cache.annotations',
					'doctrine.cache.default.metadata',
					'doctrine.cache.default.query',
					'doctrine.cache.default.ormResult',
					'doctrine.cache.default.hydration',
					'doctrine.cache.default.dbalResult',
				],
			],
			'Doctrine\Common\Persistence\Mapping\Driver\MappingDriver' => [
				[
					'doctrine.default.metadataDriver',
					'doctrine.default.driver.UserModule.annotationsImpl',
					'doctrine.default.driver.SettingsModule.annotationsImpl',
					'doctrine.default.driver.ProjectModule.annotationsImpl',
					'doctrine.default.driver.ProfileModule.annotationsImpl',
					'doctrine.default.driver.MultimediaModule.annotationsImpl',
					'doctrine.default.driver.MailerModule.annotationsImpl',
					'doctrine.default.driver.LogModule.annotationsImpl',
					'doctrine.default.driver.HomepageModule.annotationsImpl',
					'doctrine.default.driver.HelpModule.annotationsImpl',
					'doctrine.default.driver.DefaultModule.annotationsImpl',
					'doctrine.default.driver.ClientModule.annotationsImpl',
					'doctrine.default.driver.AuthorizatorModule.annotationsImpl',
					'doctrine.default.driver.App.annotationsImpl',
					'doctrine.default.driver.Kdyby_Doctrine.annotationsImpl',
				],
			],
			'Doctrine\Common\Persistence\Mapping\Driver\MappingDriverChain' => [['doctrine.default.metadataDriver']],
			'Doctrine\ORM\Repository\RepositoryFactory' => [['doctrine.default.repositoryFactory']],
			'Kdyby\Doctrine\RepositoryFactory' => [['doctrine.default.repositoryFactory']],
			'Doctrine\ORM\Configuration' => [['doctrine.default.ormConfiguration']],
			'Doctrine\DBAL\Configuration' => [
				[
					'doctrine.default.ormConfiguration',
					'doctrine.default.dbalConfiguration',
				],
			],
			'Kdyby\Doctrine\Configuration' => [['doctrine.default.ormConfiguration']],
			'Kdyby\Events\NamespacedEventManager' => [['doctrine.default.evm']],
			'Doctrine\ORM\EntityManager' => [1 => ['doctrine.default.entityManager']],
			'Doctrine\Common\Persistence\ObjectManager' => [1 => ['doctrine.default.entityManager']],
			'Doctrine\ORM\EntityManagerInterface' => [1 => ['doctrine.default.entityManager']],
			'Kdyby\Persistence\QueryExecutor' => [1 => ['doctrine.default.entityManager', 'doctrine.dao']],
			'Kdyby\Persistence\Queryable' => [1 => ['doctrine.default.entityManager', 'doctrine.dao']],
			'Kdyby\Doctrine\EntityManager' => [1 => ['doctrine.default.entityManager']],
			'Doctrine\DBAL\Logging\SQLLogger' => [['doctrine.default.diagnosticsPanel']],
			'Kdyby\Doctrine\Diagnostics\Panel' => [['doctrine.default.diagnosticsPanel']],
			'Doctrine\DBAL\Connection' => [1 => ['doctrine.default.connection']],
			'Doctrine\DBAL\Driver\Connection' => [1 => ['doctrine.default.connection']],
			'Kdyby\Doctrine\Connection' => [1 => ['doctrine.default.connection']],
			'Kdyby\Doctrine\EntityRepository' => [1 => ['doctrine.dao']],
			'Doctrine\ORM\EntityRepository' => [1 => ['doctrine.dao']],
			'Doctrine\Common\Persistence\ObjectRepository' => [1 => ['doctrine.dao']],
			'Doctrine\Common\Collections\Selectable' => [1 => ['doctrine.dao']],
			'Kdyby\Persistence\ObjectDao' => [1 => ['doctrine.dao']],
			'Kdyby\Doctrine\EntityDao' => [1 => ['doctrine.dao']],
			'Kdyby\Doctrine\EntityDaoFactory' => [1 => ['doctrine.daoFactory']],
			'Kdyby\Doctrine\DI\IRepositoryFactory' => [['doctrine.repositoryFactory.default.defaultRepositoryFactory']],
			'Doctrine\ORM\Tools\SchemaValidator' => [1 => ['doctrine.default.schemaValidator']],
			'Doctrine\ORM\Tools\SchemaTool' => [1 => ['doctrine.default.schemaTool']],
			'Kdyby\Doctrine\Tools\CacheCleaner' => [1 => ['doctrine.default.cacheCleaner']],
			'Doctrine\DBAL\Schema\AbstractSchemaManager' => [1 => ['doctrine.default.schemaManager']],
			'Symfony\Component\Console\Helper\Helper' => [1 => ['doctrine.helper.entityManager', 'doctrine.helper.connection']],
			'Symfony\Component\Console\Helper\HelperInterface' => [1 => ['doctrine.helper.entityManager', 'doctrine.helper.connection']],
			'Doctrine\ORM\Tools\Console\Helper\EntityManagerHelper' => [1 => ['doctrine.helper.entityManager']],
			'Doctrine\DBAL\Tools\Console\Helper\ConnectionHelper' => [1 => ['doctrine.helper.connection']],
			'Kdyby\Doctrine\Console\OrmDelegateCommand' => [
				1 => [
					'doctrine.cli.0',
					'doctrine.cli.1',
					'doctrine.cli.2',
					'doctrine.cli.3',
					'doctrine.cli.4',
					'doctrine.cli.5',
					'doctrine.cli.6',
					'doctrine.cli.7',
					'doctrine.cli.8',
					'doctrine.cli.10',
					'doctrine.cli.11',
					'doctrine.cli.13',
					'doctrine.cli.14',
					'doctrine.cli.15',
					'doctrine.cli.16',
				],
			],
			'Kdyby\Doctrine\Console\Proxy\CacheClearCollectionRegionCommand' => [1 => ['doctrine.cli.0']],
			'Kdyby\Doctrine\Console\Proxy\CacheClearEntityRegionCommand' => [1 => ['doctrine.cli.1']],
			'Kdyby\Doctrine\Console\Proxy\CacheClearMetadataCommand' => [1 => ['doctrine.cli.2']],
			'Kdyby\Doctrine\Console\Proxy\CacheClearQueryCommand' => [1 => ['doctrine.cli.3']],
			'Kdyby\Doctrine\Console\Proxy\CacheClearQueryRegionCommand' => [1 => ['doctrine.cli.4']],
			'Kdyby\Doctrine\Console\Proxy\CacheClearResultCommand' => [1 => ['doctrine.cli.5']],
			'Kdyby\Doctrine\Console\Proxy\ConvertMappingCommand' => [1 => ['doctrine.cli.6']],
			'Kdyby\Doctrine\Console\Proxy\GenerateEntitiesCommand' => [1 => ['doctrine.cli.7']],
			'Kdyby\Doctrine\Console\Proxy\GenerateProxiesCommand' => [1 => ['doctrine.cli.8']],
			'Kdyby\Doctrine\Console\DbalDelegateCommand' => [1 => ['doctrine.cli.9', 'doctrine.cli.12']],
			'Kdyby\Doctrine\Console\Proxy\ImportCommand' => [1 => ['doctrine.cli.9']],
			'Kdyby\Doctrine\Console\Proxy\InfoCommand' => [1 => ['doctrine.cli.10']],
			'Kdyby\Doctrine\Console\Proxy\MappingDescribeCommand' => [1 => ['doctrine.cli.11']],
			'Kdyby\Doctrine\Console\Proxy\ReservedWordsCommand' => [1 => ['doctrine.cli.12']],
			'Kdyby\Doctrine\Console\Proxy\SchemaCreateCommand' => [1 => ['doctrine.cli.13']],
			'Kdyby\Doctrine\Console\Proxy\SchemaUpdateCommand' => [1 => ['doctrine.cli.14']],
			'Kdyby\Doctrine\Console\Proxy\SchemaDropCommand' => [1 => ['doctrine.cli.15']],
			'Kdyby\Doctrine\Console\Proxy\ValidateSchemaCommand' => [1 => ['doctrine.cli.16']],
			'Doctrine\Common\Persistence\AbstractManagerRegistry' => [1 => ['doctrine.registry']],
			'Doctrine\Common\Persistence\ConnectionRegistry' => [1 => ['doctrine.registry']],
			'Doctrine\Common\Persistence\ManagerRegistry' => [1 => ['doctrine.registry']],
			'Kdyby\Doctrine\Registry' => [1 => ['doctrine.registry']],
			'IPub\VisualPaginator\Components\IControl' => [1 => ['visualPaginator.paginator']],
			'Nette\Object' => [
				1 => [
					'backend.default.AppSetupService',
					'backend.default.SimpleEntityService',
					'backend.default.HydratorService',
					'backend.default.AddressService',
					'backend.default.BillingAddressService',
					'backend.default.AutocompleteService',
					'backend.default.CurrencyService',
					'backend.default.MenuitemService',
					'backend.default.AddressRepository',
					'backend.default.BillingAddressRepository',
					'backend.default.CurrencyRepository',
					'backend.default.AutocompleteRepository',
					'backend.default.MenuitemRepository',
					'backend.default.TranslatedFormFactory',
					'backend.default.VisualPaginatorFactory',
					'backend.default.DatagridFactory',
					'backend.default.DirService',
					'authentication.loginFormFactory',
					'authentication.authentication',
					'project.projectRepository',
					'project.projectService',
					'project.TestSetRepository',
					'project.TestSetService',
					'project.TestCaseRepository',
					'project.TestCaseService',
					'project.testCaseFormFactory',
					'project.TestPlanRepository',
					'project.TestPlanService',
					'project.TestPlanSprintRepository',
					'project.TestPlanSprintService',
					'project.ProjectRoleRepository',
					'project.ProjectRoleService',
					'project.TestPlanSprintCaseRepository',
					'project.TestPlanSprintCaseService',
					'project.TagTestCaseRepository',
					'project.TagTestCaseService',
					'project.TagDatesFormFactory',
					'log.logService',
					'log.logRepository',
					'user.userService',
					'user.userRepository',
					'user.userFormFactory',
					'client.clientService',
					'client.clientRepository',
					'settings.settingsService',
					'settings.settingsRepository',
					'settings.groupFormFactory',
					'settings.fieldFormFactory',
					'settings.SettingsManager',
					'mailer.mailerService',
					'mailer.mailerRepository',
					'mailer.mailerDefaultService',
					'mailer.mailerDefaultRepository',
					'mailer.mailerDefaultFormFactory',
					'multimedia.multimediaService',
					'multimedia.multimediaRepository',
					'multimedia.multimediaFolderService',
					'multimedia.multimediaFolderRepository',
					'profile.updateProfileFormFactory',
					'homepage.loginPictureService',
					'homepage.loginPictureRepository',
				],
			],
			'DefaultModule\Services\AppSetupService' => [1 => ['backend.default.AppSetupService']],
			'DefaultModule\Services\SimpleEntityService' => [1 => ['backend.default.SimpleEntityService']],
			'DefaultModule\Services\HydratorService' => [1 => ['backend.default.HydratorService']],
			'DefaultModule\Services\AddressService' => [1 => ['backend.default.AddressService']],
			'DefaultModule\Services\BillingAddressService' => [1 => ['backend.default.BillingAddressService']],
			'DefaultModule\Services\AutocompleteService' => [1 => ['backend.default.AutocompleteService']],
			'DefaultModule\Services\CurrencyService' => [1 => ['backend.default.CurrencyService']],
			'DefaultModule\Services\MenuitemService' => [1 => ['backend.default.MenuitemService']],
			'DefaultModule\Repositories\AddressRepository' => [1 => ['backend.default.AddressRepository']],
			'DefaultModule\Repositories\BillingAddressRepository' => [1 => ['backend.default.BillingAddressRepository']],
			'DefaultModule\Repositories\CurrencyRepository' => [1 => ['backend.default.CurrencyRepository']],
			'DefaultModule\Repositories\AutocompleteRepository' => [1 => ['backend.default.AutocompleteRepository']],
			'DefaultModule\Repositories\MenuitemRepository' => [1 => ['backend.default.MenuitemRepository']],
			'DefaultModule\Factories\TranslatedFormFactory' => [1 => ['backend.default.TranslatedFormFactory']],
			'DefaultModule\Factories\VisualPaginatorFactory' => [1 => ['backend.default.VisualPaginatorFactory']],
			'DefaultModule\Factories\DatagridFactory' => [1 => ['backend.default.DatagridFactory']],
			'DefaultModule\Factories\GeneralSearchFormFactory' => [1 => ['backend.default.GeneralSearchFormFactory']],
			'DefaultModule\Classes\MyMailer' => [1 => ['backend.default.MyMailer']],
			'DefaultModule\Interfaces\ILinkResolverFactory' => [1 => ['backend.default.ILinkResolverFactory']],
			'DefaultModule\Interfaces\IGeneralSearch' => [1 => ['backend.default.IGeneralSearch']],
			'DefaultModule\Services\DirService' => [1 => ['backend.default.DirService']],
			'AuthenticationModule\Factories\LoginFormFactory' => [1 => ['authentication.loginFormFactory']],
			'Nette\Security\IAuthenticator' => [1 => ['authentication.authentication']],
			'AuthenticationModule\Classes\Authentication' => [1 => ['authentication.authentication']],
			'ProjectModule\Interfaces\IRoleSettingsControlFactory' => [1 => ['project.IRoleSettingsControlFactory']],
			'DefaultModule\Interfaces\IFormFactory' => [
				1 => [
					'project.RoleFormFactory',
					'user.userFormFactory',
					'settings.groupFormFactory',
					'settings.fieldFormFactory',
					'settings.generalSettingsFormFactory',
					'mailer.mailerDefaultFormFactory',
					'mailer.mailerFormFactory',
				],
			],
			'ProjectModule\Factories\RoleFormFactory' => [1 => ['project.RoleFormFactory']],
			'ProjectModule\Factories\ProjectFormFactory' => [1 => ['project.projectFormFactory']],
			'ProjectModule\Factories\TestSetFormFactory' => [1 => ['project.testSetFormFactory']],
			'ProjectModule\Repositories\ProjectRepository' => [1 => ['project.projectRepository']],
			'ProjectModule\Services\ProjectService' => [1 => ['project.projectService']],
			'ProjectModule\Repositories\TestSetRepository' => [1 => ['project.TestSetRepository']],
			'ProjectModule\Services\TestSetService' => [1 => ['project.TestSetService']],
			'ProjectModule\Repositories\TestCaseRepository' => [1 => ['project.TestCaseRepository']],
			'ProjectModule\Services\TestCaseService' => [1 => ['project.TestCaseService']],
			'DefaultModule\Factories\DynamicFormFactory' => [
				1 => [
					'project.testCaseFormFactory',
					'project.TagDatesFormFactory',
					'user.userFormFactory',
					'settings.groupFormFactory',
					'settings.fieldFormFactory',
					'mailer.mailerDefaultFormFactory',
				],
			],
			'ProjectModule\Factories\TestCaseFormFactory' => [1 => ['project.testCaseFormFactory']],
			'ProjectModule\Repositories\TestPlanRepository' => [1 => ['project.TestPlanRepository']],
			'ProjectModule\Services\TestPlanService' => [1 => ['project.TestPlanService']],
			'ProjectModule\Factories\TestPlanFormFactory' => [1 => ['project.TestPlanFormFactory']],
			'ProjectModule\Repositories\TestPlanSprintRepository' => [1 => ['project.TestPlanSprintRepository']],
			'ProjectModule\Services\TestPlanSprintService' => [1 => ['project.TestPlanSprintService']],
			'ProjectModule\Factories\TestPlanSprintFormFactory' => [1 => ['project.TestPlanSprintFormFactory']],
			'ProjectModule\Repositories\ProjectRoleRepository' => [1 => ['project.ProjectRoleRepository']],
			'ProjectModule\Services\ProjectRoleService' => [1 => ['project.ProjectRoleService']],
			'ProjectModule\Factories\TestPlanSprintRoleFormFactory' => [1 => ['project.TestPlanSprintRoleFormFactory']],
			'ProjectModule\Repositories\TestPlanSprintCaseRepository' => [1 => ['project.TestPlanSprintCaseRepository']],
			'ProjectModule\Services\TestPlanSprintCaseService' => [1 => ['project.TestPlanSprintCaseService']],
			'ProjectModule\Factories\IssueFormFactory' => [1 => ['project.IssueFormFactory']],
			'ProjectModule\Factories\ImportTestAnalysesFormFactory' => [1 => ['project.ImportTestAnalysesFormFactory']],
			'ProjectModule\Repositories\TagTestCaseRepository' => [1 => ['project.TagTestCaseRepository']],
			'ProjectModule\Services\TagTestCaseService' => [1 => ['project.TagTestCaseService']],
			'ProjectModule\Factories\TagDatesFormFactory' => [1 => ['project.TagDatesFormFactory']],
			'ProjectModule\Factories\IssueCommentFormFactory' => [1 => ['project.IssueCommentFormFactory']],
			'LogModule\Services\LogService' => [1 => ['log.logService']],
			'LogModule\Repositories\LogRepository' => [1 => ['log.logRepository']],
			'UserModule\Services\UserService' => [1 => ['user.userService']],
			'UserModule\Repositories\UserRepository' => [1 => ['user.userRepository']],
			'UserModule\Factories\UserFormFactory' => [1 => ['user.userFormFactory']],
			'UserModule\Factories\LostPasswordFormFactory' => [1 => ['user.LostPasswordFormFactory']],
			'ClientModule\Services\ClientService' => [1 => ['client.clientService']],
			'ClientModule\Repositories\ClientRepository' => [1 => ['client.clientRepository']],
			'SettingsModule\Services\SettingsService' => [1 => ['settings.settingsService']],
			'SettingsModule\Repositories\SettingsRepository' => [1 => ['settings.settingsRepository']],
			'SettingsModule\Factories\GroupFormFactory' => [1 => ['settings.groupFormFactory']],
			'SettingsModule\Factories\FieldFormFactory' => [1 => ['settings.fieldFormFactory']],
			'SettingsModule\Factories\GeneralSettingsFormFactory' => [1 => ['settings.generalSettingsFormFactory']],
			'SettingsModule\Services\SettingsManager' => [1 => ['settings.SettingsManager']],
			'MailerModule\Services\MailerService' => [1 => ['mailer.mailerService']],
			'MailerModule\Repositories\MailerRepository' => [1 => ['mailer.mailerRepository']],
			'MailerModule\Services\MailerDefaultService' => [1 => ['mailer.mailerDefaultService']],
			'MailerModule\Repositories\MailerDefaultRepository' => [1 => ['mailer.mailerDefaultRepository']],
			'MailerModule\Factories\MailerDefaultFormFactory' => [1 => ['mailer.mailerDefaultFormFactory']],
			'MailerModule\Factories\MailerFormFactory' => [1 => ['mailer.mailerFormFactory']],
			'MailerModule\Factories\MailerSettingsFormFactory' => [1 => ['mailer.mailerSettingsFormFactory']],
			'DefaultModule\Classes\ModuleSearch' => [1 => ['mailer.mailerModuleSearch']],
			'MailerModule\Classes\MailerModuleSearch' => [1 => ['mailer.mailerModuleSearch']],
			'MailerModule\Interfaces\ISettingsControlFactory' => [1 => ['mailer.ISettingsControlFactory']],
			'MultimediaModule\Services\MultimediaService' => [1 => ['multimedia.multimediaService']],
			'MultimediaModule\Repositories\MultimediaRepository' => [1 => ['multimedia.multimediaRepository']],
			'MultimediaModule\Interfaces\IMultimediaSaver' => [1 => ['multimedia.iMultimediaSaver']],
			'MultimediaModule\Services\Multimedia_folderService' => [1 => ['multimedia.multimediaFolderService']],
			'MultimediaModule\Repositories\Multimedia_folderRepository' => [1 => ['multimedia.multimediaFolderRepository']],
			'ProfileModule\Factories\UpdateProfileFormFactory' => [1 => ['profile.updateProfileFormFactory']],
			'ProfileModule\Factories\TicketFormFactory' => [1 => ['profile.ticketFormFactory']],
			'HomepageModule\Factories\LoginPictureFormFactory' => [1 => ['homepage.loginPictureFormFactory']],
			'HomepageModule\Services\LoginPictureService' => [1 => ['homepage.loginPictureService']],
			'HomepageModule\Repositories\LoginPictureRepository' => [1 => ['homepage.loginPictureRepository']],
			'HomepageModule\Interfaces\ISettingsControlFactory' => [1 => ['homepage.ISettingsControlFactory']],
			'AuthorizatorModule\Classes\Authorizator' => [1 => ['authorizator.Authorizator']],
			'App\RouterFactory' => [1 => ['routerFactory']],
			'DefaultModule\Presenters\DefaultPresenter' => [
				1 => [
					'application.1',
					'application.2',
					'application.3',
					'application.4',
					'application.5',
					'application.6',
					'application.7',
					'application.8',
					'application.9',
					'application.10',
					'application.14',
					'application.15',
					'application.16',
					'application.17',
					'application.18',
					'application.19',
					'application.20',
				],
			],
			'App\BasePresenter' => [
				1 => [
					'application.1',
					'application.2',
					'application.3',
					'application.4',
					'application.5',
					'application.6',
					'application.7',
					'application.8',
					'application.9',
					'application.10',
					'application.14',
					'application.15',
					'application.16',
					'application.17',
					'application.18',
					'application.19',
					'application.20',
					'application.23',
					'application.24',
				],
			],
			'Nette\Application\UI\Presenter' => [
				[
					'application.1',
					'application.2',
					'application.3',
					'application.4',
					'application.5',
					'application.6',
					'application.7',
					'application.8',
					'application.9',
					'application.10',
					'application.11',
					'application.12',
					'application.13',
					'application.14',
					'application.15',
					'application.16',
					'application.17',
					'application.18',
					'application.19',
					'application.20',
					'application.21',
					'application.22',
					'application.23',
					'application.24',
					'application.25',
				],
			],
			'Nette\Application\UI\Control' => [
				[
					'application.1',
					'application.2',
					'application.3',
					'application.4',
					'application.5',
					'application.6',
					'application.7',
					'application.8',
					'application.9',
					'application.10',
					'application.11',
					'application.12',
					'application.13',
					'application.14',
					'application.15',
					'application.16',
					'application.17',
					'application.18',
					'application.19',
					'application.20',
					'application.21',
					'application.22',
					'application.23',
					'application.24',
					'application.25',
				],
			],
			'Nette\Application\UI\Component' => [
				[
					'application.1',
					'application.2',
					'application.3',
					'application.4',
					'application.5',
					'application.6',
					'application.7',
					'application.8',
					'application.9',
					'application.10',
					'application.11',
					'application.12',
					'application.13',
					'application.14',
					'application.15',
					'application.16',
					'application.17',
					'application.18',
					'application.19',
					'application.20',
					'application.21',
					'application.22',
					'application.23',
					'application.24',
					'application.25',
				],
			],
			'Nette\ComponentModel\Container' => [
				[
					'application.1',
					'application.2',
					'application.3',
					'application.4',
					'application.5',
					'application.6',
					'application.7',
					'application.8',
					'application.9',
					'application.10',
					'application.11',
					'application.12',
					'application.13',
					'application.14',
					'application.15',
					'application.16',
					'application.17',
					'application.18',
					'application.19',
					'application.20',
					'application.21',
					'application.22',
					'application.23',
					'application.24',
					'application.25',
				],
			],
			'Nette\ComponentModel\Component' => [
				[
					'application.1',
					'application.2',
					'application.3',
					'application.4',
					'application.5',
					'application.6',
					'application.7',
					'application.8',
					'application.9',
					'application.10',
					'application.11',
					'application.12',
					'application.13',
					'application.14',
					'application.15',
					'application.16',
					'application.17',
					'application.18',
					'application.19',
					'application.20',
					'application.21',
					'application.22',
					'application.23',
					'application.24',
					'application.25',
				],
			],
			'Nette\Application\IPresenter' => [
				[
					'application.1',
					'application.2',
					'application.3',
					'application.4',
					'application.5',
					'application.6',
					'application.7',
					'application.8',
					'application.9',
					'application.10',
					'application.11',
					'application.12',
					'application.13',
					'application.14',
					'application.15',
					'application.16',
					'application.17',
					'application.18',
					'application.19',
					'application.20',
					'application.21',
					'application.22',
					'application.23',
					'application.24',
					'application.25',
					'application.26',
					'application.27',
				],
			],
			'ArrayAccess' => [
				[
					'application.1',
					'application.2',
					'application.3',
					'application.4',
					'application.5',
					'application.6',
					'application.7',
					'application.8',
					'application.9',
					'application.10',
					'application.11',
					'application.12',
					'application.13',
					'application.14',
					'application.15',
					'application.16',
					'application.17',
					'application.18',
					'application.19',
					'application.20',
					'application.21',
					'application.22',
					'application.23',
					'application.24',
					'application.25',
				],
			],
			'Nette\Application\UI\IStatePersistent' => [
				[
					'application.1',
					'application.2',
					'application.3',
					'application.4',
					'application.5',
					'application.6',
					'application.7',
					'application.8',
					'application.9',
					'application.10',
					'application.11',
					'application.12',
					'application.13',
					'application.14',
					'application.15',
					'application.16',
					'application.17',
					'application.18',
					'application.19',
					'application.20',
					'application.21',
					'application.22',
					'application.23',
					'application.24',
					'application.25',
				],
			],
			'Nette\Application\UI\ISignalReceiver' => [
				[
					'application.1',
					'application.2',
					'application.3',
					'application.4',
					'application.5',
					'application.6',
					'application.7',
					'application.8',
					'application.9',
					'application.10',
					'application.11',
					'application.12',
					'application.13',
					'application.14',
					'application.15',
					'application.16',
					'application.17',
					'application.18',
					'application.19',
					'application.20',
					'application.21',
					'application.22',
					'application.23',
					'application.24',
					'application.25',
				],
			],
			'Nette\ComponentModel\IComponent' => [
				[
					'application.1',
					'application.2',
					'application.3',
					'application.4',
					'application.5',
					'application.6',
					'application.7',
					'application.8',
					'application.9',
					'application.10',
					'application.11',
					'application.12',
					'application.13',
					'application.14',
					'application.15',
					'application.16',
					'application.17',
					'application.18',
					'application.19',
					'application.20',
					'application.21',
					'application.22',
					'application.23',
					'application.24',
					'application.25',
				],
			],
			'Nette\ComponentModel\IContainer' => [
				[
					'application.1',
					'application.2',
					'application.3',
					'application.4',
					'application.5',
					'application.6',
					'application.7',
					'application.8',
					'application.9',
					'application.10',
					'application.11',
					'application.12',
					'application.13',
					'application.14',
					'application.15',
					'application.16',
					'application.17',
					'application.18',
					'application.19',
					'application.20',
					'application.21',
					'application.22',
					'application.23',
					'application.24',
					'application.25',
				],
			],
			'Nette\Application\UI\IRenderable' => [
				[
					'application.1',
					'application.2',
					'application.3',
					'application.4',
					'application.5',
					'application.6',
					'application.7',
					'application.8',
					'application.9',
					'application.10',
					'application.11',
					'application.12',
					'application.13',
					'application.14',
					'application.15',
					'application.16',
					'application.17',
					'application.18',
					'application.19',
					'application.20',
					'application.21',
					'application.22',
					'application.23',
					'application.24',
					'application.25',
				],
			],
			'HelpModule\Presenters\HelpPresenter' => [1 => ['application.1']],
			'HomepageModule\Presenters\HomepagePresenter' => [1 => ['application.2']],
			'LogModule\Presenters\LogPresenter' => [1 => ['application.3']],
			'MailerModule\Presenters\MailerPresenter' => [1 => ['application.4']],
			'MultimediaModule\Presenters\MultimediaPresenter' => [1 => ['application.5']],
			'ProfileModule\Presenters\ProfilePresenter' => [1 => ['application.6']],
			'ProjectModule\Presenters\ManagementPresenter' => [
				1 => [
					'application.7',
					'application.8',
					'application.9',
					'application.14',
					'application.15',
					'application.16',
					'application.17',
				],
			],
			'ProjectModule\Presenters\ProjectPresenter' => [
				1 => [
					'application.7',
					'application.8',
					'application.9',
					'application.10',
					'application.14',
					'application.15',
					'application.16',
					'application.17',
				],
			],
			'ProjectModule\Presenters\DashboardPresenter' => [1 => ['application.7']],
			'ProjectModule\Presenters\IssuesPresenter' => [1 => ['application.8']],
			'ProjectModule\Presenters\RestIssuesPresenter' => [1 => ['application.11']],
			'ProjectModule\Presenters\RestSettingsPresenter' => [1 => ['application.12']],
			'ProjectModule\Presenters\RestTestExecutionPresenter' => [1 => ['application.13']],
			'ProjectModule\Presenters\SettingsPresenter' => [1 => ['application.14']],
			'ProjectModule\Presenters\TestAnalysesPresenter' => [1 => ['application.15']],
			'ProjectModule\Presenters\TestExecutionPresenter' => [1 => ['application.16']],
			'ProjectModule\Presenters\TestPlanPresenter' => [1 => ['application.17']],
			'SettingsModule\Presenters\SimpleSettingsPresenter' => [1 => ['application.18']],
			'SettingsModule\Presenters\SpecificSettingsPresenter' => [1 => ['application.19']],
			'UserModule\Presenters\UserPresenter' => [1 => ['application.20']],
			'Ublaboo\DataGrid\Tests\Files\ExportTestingPresenter' => [1 => ['application.21']],
			'Ublaboo\DataGrid\Tests\Files\XTestingPresenter' => [1 => ['application.22']],
			'App\Presenters\ErrorPresenter' => [1 => ['application.23']],
			'Front\DomovModule\Presenters\DefaultModulePresenter' => [1 => ['application.24']],
			'Front\DomovModule\Presenters\DomovPresenter' => [1 => ['application.24']],
			'KdybyModule\CliPresenter' => [1 => ['application.25']],
			'NetteModule\ErrorPresenter' => [1 => ['application.26']],
			'NetteModule\MicroPresenter' => [1 => ['application.27']],
			'Nette\DI\Container' => [1 => ['container']],
		],
		'services' => [
			'annotations.cache.annotations' => 'Doctrine\Common\Cache\Cache',
			'annotations.reader' => 'Doctrine\Common\Annotations\Reader',
			'annotations.reflectionReader' => 'Doctrine\Common\Annotations\AnnotationReader',
			'application.1' => 'HelpModule\Presenters\HelpPresenter',
			'application.10' => 'ProjectModule\Presenters\ProjectPresenter',
			'application.11' => 'ProjectModule\Presenters\RestIssuesPresenter',
			'application.12' => 'ProjectModule\Presenters\RestSettingsPresenter',
			'application.13' => 'ProjectModule\Presenters\RestTestExecutionPresenter',
			'application.14' => 'ProjectModule\Presenters\SettingsPresenter',
			'application.15' => 'ProjectModule\Presenters\TestAnalysesPresenter',
			'application.16' => 'ProjectModule\Presenters\TestExecutionPresenter',
			'application.17' => 'ProjectModule\Presenters\TestPlanPresenter',
			'application.18' => 'SettingsModule\Presenters\SimpleSettingsPresenter',
			'application.19' => 'SettingsModule\Presenters\SpecificSettingsPresenter',
			'application.2' => 'HomepageModule\Presenters\HomepagePresenter',
			'application.20' => 'UserModule\Presenters\UserPresenter',
			'application.21' => 'Ublaboo\DataGrid\Tests\Files\ExportTestingPresenter',
			'application.22' => 'Ublaboo\DataGrid\Tests\Files\XTestingPresenter',
			'application.23' => 'App\Presenters\ErrorPresenter',
			'application.24' => 'Front\DomovModule\Presenters\DomovPresenter',
			'application.25' => 'KdybyModule\CliPresenter',
			'application.26' => 'NetteModule\ErrorPresenter',
			'application.27' => 'NetteModule\MicroPresenter',
			'application.3' => 'LogModule\Presenters\LogPresenter',
			'application.4' => 'MailerModule\Presenters\MailerPresenter',
			'application.5' => 'MultimediaModule\Presenters\MultimediaPresenter',
			'application.6' => 'ProfileModule\Presenters\ProfilePresenter',
			'application.7' => 'ProjectModule\Presenters\DashboardPresenter',
			'application.8' => 'ProjectModule\Presenters\IssuesPresenter',
			'application.9' => 'ProjectModule\Presenters\ManagementPresenter',
			'application.application' => 'Nette\Application\Application',
			'application.linkGenerator' => 'Nette\Application\LinkGenerator',
			'application.presenterFactory' => 'Nette\Application\IPresenterFactory',
			'authentication.authentication' => 'AuthenticationModule\Classes\Authentication',
			'authentication.loginFormFactory' => 'AuthenticationModule\Factories\LoginFormFactory',
			'authorizator.Authorizator' => 'AuthorizatorModule\Classes\Authorizator',
			'backend.default.AddressRepository' => 'DefaultModule\Repositories\AddressRepository',
			'backend.default.AddressService' => 'DefaultModule\Services\AddressService',
			'backend.default.AppSetupService' => 'DefaultModule\Services\AppSetupService',
			'backend.default.AutocompleteRepository' => 'DefaultModule\Repositories\AutocompleteRepository',
			'backend.default.AutocompleteService' => 'DefaultModule\Services\AutocompleteService',
			'backend.default.BillingAddressRepository' => 'DefaultModule\Repositories\BillingAddressRepository',
			'backend.default.BillingAddressService' => 'DefaultModule\Services\BillingAddressService',
			'backend.default.CurrencyRepository' => 'DefaultModule\Repositories\CurrencyRepository',
			'backend.default.CurrencyService' => 'DefaultModule\Services\CurrencyService',
			'backend.default.DatagridFactory' => 'DefaultModule\Factories\DatagridFactory',
			'backend.default.DirService' => 'DefaultModule\Services\DirService',
			'backend.default.GeneralSearchFormFactory' => 'DefaultModule\Factories\GeneralSearchFormFactory',
			'backend.default.HydratorService' => 'DefaultModule\Services\HydratorService',
			'backend.default.IGeneralSearch' => 'DefaultModule\Controls\GeneralSearch',
			'backend.default.ILinkResolverFactory' => 'DefaultModule\Classes\LinkResolver',
			'backend.default.MenuitemRepository' => 'DefaultModule\Repositories\MenuitemRepository',
			'backend.default.MenuitemService' => 'DefaultModule\Services\MenuitemService',
			'backend.default.MyMailer' => 'DefaultModule\Classes\MyMailer',
			'backend.default.SimpleEntityService' => 'DefaultModule\Services\SimpleEntityService',
			'backend.default.TranslatedFormFactory' => 'DefaultModule\Factories\TranslatedFormFactory',
			'backend.default.VisualPaginatorFactory' => 'DefaultModule\Factories\VisualPaginatorFactory',
			'cache.journal' => 'Nette\Caching\Storages\IJournal',
			'cache.storage' => 'Nette\Caching\IStorage',
			'client.clientRepository' => 'ClientModule\Repositories\ClientRepository',
			'client.clientService' => 'ClientModule\Services\ClientService',
			'console.application' => 'Kdyby\Console\Application',
			'console.helperSet' => 'Symfony\Component\Console\Helper\HelperSet',
			'container' => 'Nette\DI\Container',
			'database.default.connection' => 'Nette\Database\Connection',
			'database.default.context' => 'Nette\Database\Context',
			'database.default.conventions' => 'Nette\Database\Conventions\DiscoveredConventions',
			'database.default.structure' => 'Nette\Database\Structure',
			'doctrine.cache.default.dbalResult' => 'Doctrine\Common\Cache\Cache',
			'doctrine.cache.default.hydration' => 'Doctrine\Common\Cache\Cache',
			'doctrine.cache.default.metadata' => 'Doctrine\Common\Cache\Cache',
			'doctrine.cache.default.ormResult' => 'Doctrine\Common\Cache\Cache',
			'doctrine.cache.default.query' => 'Doctrine\Common\Cache\Cache',
			'doctrine.cli.0' => 'Kdyby\Doctrine\Console\Proxy\CacheClearCollectionRegionCommand',
			'doctrine.cli.1' => 'Kdyby\Doctrine\Console\Proxy\CacheClearEntityRegionCommand',
			'doctrine.cli.10' => 'Kdyby\Doctrine\Console\Proxy\InfoCommand',
			'doctrine.cli.11' => 'Kdyby\Doctrine\Console\Proxy\MappingDescribeCommand',
			'doctrine.cli.12' => 'Kdyby\Doctrine\Console\Proxy\ReservedWordsCommand',
			'doctrine.cli.13' => 'Kdyby\Doctrine\Console\Proxy\SchemaCreateCommand',
			'doctrine.cli.14' => 'Kdyby\Doctrine\Console\Proxy\SchemaUpdateCommand',
			'doctrine.cli.15' => 'Kdyby\Doctrine\Console\Proxy\SchemaDropCommand',
			'doctrine.cli.16' => 'Kdyby\Doctrine\Console\Proxy\ValidateSchemaCommand',
			'doctrine.cli.2' => 'Kdyby\Doctrine\Console\Proxy\CacheClearMetadataCommand',
			'doctrine.cli.3' => 'Kdyby\Doctrine\Console\Proxy\CacheClearQueryCommand',
			'doctrine.cli.4' => 'Kdyby\Doctrine\Console\Proxy\CacheClearQueryRegionCommand',
			'doctrine.cli.5' => 'Kdyby\Doctrine\Console\Proxy\CacheClearResultCommand',
			'doctrine.cli.6' => 'Kdyby\Doctrine\Console\Proxy\ConvertMappingCommand',
			'doctrine.cli.7' => 'Kdyby\Doctrine\Console\Proxy\GenerateEntitiesCommand',
			'doctrine.cli.8' => 'Kdyby\Doctrine\Console\Proxy\GenerateProxiesCommand',
			'doctrine.cli.9' => 'Kdyby\Doctrine\Console\Proxy\ImportCommand',
			'doctrine.dao' => 'Kdyby\Doctrine\EntityDao',
			'doctrine.daoFactory' => 'Kdyby\Doctrine\EntityDao',
			'doctrine.default.cacheCleaner' => 'Kdyby\Doctrine\Tools\CacheCleaner',
			'doctrine.default.connection' => 'Kdyby\Doctrine\Connection',
			'doctrine.default.dbalConfiguration' => 'Doctrine\DBAL\Configuration',
			'doctrine.default.diagnosticsPanel' => 'Kdyby\Doctrine\Diagnostics\Panel',
			'doctrine.default.driver.App.annotationsImpl' => 'Doctrine\Common\Persistence\Mapping\Driver\MappingDriver',
			'doctrine.default.driver.AuthorizatorModule.annotationsImpl' => 'Doctrine\Common\Persistence\Mapping\Driver\MappingDriver',
			'doctrine.default.driver.ClientModule.annotationsImpl' => 'Doctrine\Common\Persistence\Mapping\Driver\MappingDriver',
			'doctrine.default.driver.DefaultModule.annotationsImpl' => 'Doctrine\Common\Persistence\Mapping\Driver\MappingDriver',
			'doctrine.default.driver.HelpModule.annotationsImpl' => 'Doctrine\Common\Persistence\Mapping\Driver\MappingDriver',
			'doctrine.default.driver.HomepageModule.annotationsImpl' => 'Doctrine\Common\Persistence\Mapping\Driver\MappingDriver',
			'doctrine.default.driver.Kdyby_Doctrine.annotationsImpl' => 'Doctrine\Common\Persistence\Mapping\Driver\MappingDriver',
			'doctrine.default.driver.LogModule.annotationsImpl' => 'Doctrine\Common\Persistence\Mapping\Driver\MappingDriver',
			'doctrine.default.driver.MailerModule.annotationsImpl' => 'Doctrine\Common\Persistence\Mapping\Driver\MappingDriver',
			'doctrine.default.driver.MultimediaModule.annotationsImpl' => 'Doctrine\Common\Persistence\Mapping\Driver\MappingDriver',
			'doctrine.default.driver.ProfileModule.annotationsImpl' => 'Doctrine\Common\Persistence\Mapping\Driver\MappingDriver',
			'doctrine.default.driver.ProjectModule.annotationsImpl' => 'Doctrine\Common\Persistence\Mapping\Driver\MappingDriver',
			'doctrine.default.driver.SettingsModule.annotationsImpl' => 'Doctrine\Common\Persistence\Mapping\Driver\MappingDriver',
			'doctrine.default.driver.UserModule.annotationsImpl' => 'Doctrine\Common\Persistence\Mapping\Driver\MappingDriver',
			'doctrine.default.entityManager' => 'Kdyby\Doctrine\EntityManager',
			'doctrine.default.evm' => 'Kdyby\Events\NamespacedEventManager',
			'doctrine.default.metadataDriver' => 'Doctrine\Common\Persistence\Mapping\Driver\MappingDriverChain',
			'doctrine.default.ormConfiguration' => 'Kdyby\Doctrine\Configuration',
			'doctrine.default.repositoryFactory' => 'Kdyby\Doctrine\RepositoryFactory',
			'doctrine.default.schemaManager' => 'Doctrine\DBAL\Schema\AbstractSchemaManager',
			'doctrine.default.schemaTool' => 'Doctrine\ORM\Tools\SchemaTool',
			'doctrine.default.schemaValidator' => 'Doctrine\ORM\Tools\SchemaValidator',
			'doctrine.helper.connection' => 'Doctrine\DBAL\Tools\Console\Helper\ConnectionHelper',
			'doctrine.helper.entityManager' => 'Doctrine\ORM\Tools\Console\Helper\EntityManagerHelper',
			'doctrine.registry' => 'Kdyby\Doctrine\Registry',
			'doctrine.repositoryFactory.default.defaultRepositoryFactory' => 'Kdyby\Doctrine\EntityDao',
			'events.manager' => 'Kdyby\Events\LazyEventManager',
			'homepage.ISettingsControlFactory' => 'HomepageModule\Controls\SettingsControl',
			'homepage.loginPictureFormFactory' => 'HomepageModule\Factories\LoginPictureFormFactory',
			'homepage.loginPictureRepository' => 'HomepageModule\Repositories\LoginPictureRepository',
			'homepage.loginPictureService' => 'HomepageModule\Services\LoginPictureService',
			'http.context' => 'Nette\Http\Context',
			'http.request' => 'Nette\Http\Request',
			'http.requestFactory' => 'Nette\Http\RequestFactory',
			'http.response' => 'Nette\Http\Response',
			'latte.latteFactory' => 'Latte\Engine',
			'latte.templateFactory' => 'Nette\Application\UI\ITemplateFactory',
			'log.logRepository' => 'LogModule\Repositories\LogRepository',
			'log.logService' => 'LogModule\Services\LogService',
			'mail.mailer' => 'Nette\Mail\IMailer',
			'mailer.ISettingsControlFactory' => 'MailerModule\Controls\SettingsControl',
			'mailer.mailerDefaultFormFactory' => 'MailerModule\Factories\MailerDefaultFormFactory',
			'mailer.mailerDefaultRepository' => 'MailerModule\Repositories\MailerDefaultRepository',
			'mailer.mailerDefaultService' => 'MailerModule\Services\MailerDefaultService',
			'mailer.mailerFormFactory' => 'MailerModule\Factories\MailerFormFactory',
			'mailer.mailerModuleSearch' => 'MailerModule\Classes\MailerModuleSearch',
			'mailer.mailerRepository' => 'MailerModule\Repositories\MailerRepository',
			'mailer.mailerService' => 'MailerModule\Services\MailerService',
			'mailer.mailerSettingsFormFactory' => 'MailerModule\Factories\MailerSettingsFormFactory',
			'multimedia.iMultimediaSaver' => 'MultimediaModule\Services\MultimediaSaver',
			'multimedia.multimediaFolderRepository' => 'MultimediaModule\Repositories\Multimedia_folderRepository',
			'multimedia.multimediaFolderService' => 'MultimediaModule\Services\Multimedia_folderService',
			'multimedia.multimediaRepository' => 'MultimediaModule\Repositories\MultimediaRepository',
			'multimedia.multimediaService' => 'MultimediaModule\Services\MultimediaService',
			'profile.ticketFormFactory' => 'ProfileModule\Factories\TicketFormFactory',
			'profile.updateProfileFormFactory' => 'ProfileModule\Factories\UpdateProfileFormFactory',
			'project.IRoleSettingsControlFactory' => 'ProjectModule\Controls\RoleSettingsControl',
			'project.ImportTestAnalysesFormFactory' => 'ProjectModule\Factories\ImportTestAnalysesFormFactory',
			'project.IssueCommentFormFactory' => 'ProjectModule\Factories\IssueCommentFormFactory',
			'project.IssueFormFactory' => 'ProjectModule\Factories\IssueFormFactory',
			'project.ProjectRoleRepository' => 'ProjectModule\Repositories\ProjectRoleRepository',
			'project.ProjectRoleService' => 'ProjectModule\Services\ProjectRoleService',
			'project.RoleFormFactory' => 'ProjectModule\Factories\RoleFormFactory',
			'project.TagDatesFormFactory' => 'ProjectModule\Factories\TagDatesFormFactory',
			'project.TagTestCaseRepository' => 'ProjectModule\Repositories\TagTestCaseRepository',
			'project.TagTestCaseService' => 'ProjectModule\Services\TagTestCaseService',
			'project.TestCaseRepository' => 'ProjectModule\Repositories\TestCaseRepository',
			'project.TestCaseService' => 'ProjectModule\Services\TestCaseService',
			'project.TestPlanFormFactory' => 'ProjectModule\Factories\TestPlanFormFactory',
			'project.TestPlanRepository' => 'ProjectModule\Repositories\TestPlanRepository',
			'project.TestPlanService' => 'ProjectModule\Services\TestPlanService',
			'project.TestPlanSprintCaseRepository' => 'ProjectModule\Repositories\TestPlanSprintCaseRepository',
			'project.TestPlanSprintCaseService' => 'ProjectModule\Services\TestPlanSprintCaseService',
			'project.TestPlanSprintFormFactory' => 'ProjectModule\Factories\TestPlanSprintFormFactory',
			'project.TestPlanSprintRepository' => 'ProjectModule\Repositories\TestPlanSprintRepository',
			'project.TestPlanSprintRoleFormFactory' => 'ProjectModule\Factories\TestPlanSprintRoleFormFactory',
			'project.TestPlanSprintService' => 'ProjectModule\Services\TestPlanSprintService',
			'project.TestSetRepository' => 'ProjectModule\Repositories\TestSetRepository',
			'project.TestSetService' => 'ProjectModule\Services\TestSetService',
			'project.projectFormFactory' => 'ProjectModule\Factories\ProjectFormFactory',
			'project.projectRepository' => 'ProjectModule\Repositories\ProjectRepository',
			'project.projectService' => 'ProjectModule\Services\ProjectService',
			'project.testCaseFormFactory' => 'ProjectModule\Factories\TestCaseFormFactory',
			'project.testSetFormFactory' => 'ProjectModule\Factories\TestSetFormFactory',
			'routerFactory' => 'App\RouterFactory',
			'routing.router' => 'Nette\Application\IRouter',
			'security.user' => 'UserModule\Services\User',
			'security.userStorage' => 'Nette\Security\IUserStorage',
			'session.session' => 'Nette\Http\Session',
			'settings.SettingsManager' => 'SettingsModule\Services\SettingsManager',
			'settings.fieldFormFactory' => 'SettingsModule\Factories\FieldFormFactory',
			'settings.generalSettingsFormFactory' => 'SettingsModule\Factories\GeneralSettingsFormFactory',
			'settings.groupFormFactory' => 'SettingsModule\Factories\GroupFormFactory',
			'settings.settingsRepository' => 'SettingsModule\Repositories\SettingsRepository',
			'settings.settingsService' => 'SettingsModule\Services\SettingsService',
			'tracy.bar' => 'Tracy\Bar',
			'tracy.blueScreen' => 'Tracy\BlueScreen',
			'tracy.logger' => 'Tracy\ILogger',
			'translation.catalogueCompiler' => 'Kdyby\Translation\CatalogueCompiler',
			'translation.catalogueFactory' => 'Kdyby\Translation\CatalogueFactory',
			'translation.console.extract' => 'Kdyby\Translation\Console\ExtractCommand',
			'translation.default' => 'Kdyby\Translation\Translator',
			'translation.dumper.csv' => 'Symfony\Component\Translation\Dumper\CsvFileDumper',
			'translation.dumper.ini' => 'Symfony\Component\Translation\Dumper\IniFileDumper',
			'translation.dumper.mo' => 'Symfony\Component\Translation\Dumper\MoFileDumper',
			'translation.dumper.neon' => 'Kdyby\Translation\Dumper\NeonFileDumper',
			'translation.dumper.php' => 'Symfony\Component\Translation\Dumper\PhpFileDumper',
			'translation.dumper.po' => 'Symfony\Component\Translation\Dumper\PoFileDumper',
			'translation.dumper.qt' => 'Symfony\Component\Translation\Dumper\QtFileDumper',
			'translation.dumper.res' => 'Symfony\Component\Translation\Dumper\IcuResFileDumper',
			'translation.dumper.xliff' => 'Symfony\Component\Translation\Dumper\XliffFileDumper',
			'translation.dumper.yml' => 'Symfony\Component\Translation\Dumper\YamlFileDumper',
			'translation.extractor' => 'Symfony\Component\Translation\Extractor\ChainExtractor',
			'translation.extractor.latte' => 'Kdyby\Translation\Extractors\LatteExtractor',
			'translation.fallbackResolver' => 'Kdyby\Translation\FallbackResolver',
			'translation.formatter' => 'Symfony\Component\Translation\Formatter\MessageFormatter',
			'translation.helpers' => 'Kdyby\Translation\TemplateHelpers',
			'translation.loader' => 'Kdyby\Translation\TranslationLoader',
			'translation.loader.array' => 'Symfony\Component\Translation\Loader\ArrayLoader',
			'translation.loader.csv' => 'Symfony\Component\Translation\Loader\CsvFileLoader',
			'translation.loader.dat' => 'Symfony\Component\Translation\Loader\IcuDatFileLoader',
			'translation.loader.ini' => 'Symfony\Component\Translation\Loader\IniFileLoader',
			'translation.loader.json' => 'Symfony\Component\Translation\Loader\JsonFileLoader',
			'translation.loader.mo' => 'Symfony\Component\Translation\Loader\MoFileLoader',
			'translation.loader.neon' => 'Kdyby\Translation\Loader\NeonFileLoader',
			'translation.loader.php' => 'Symfony\Component\Translation\Loader\PhpFileLoader',
			'translation.loader.po' => 'Symfony\Component\Translation\Loader\PoFileLoader',
			'translation.loader.res' => 'Symfony\Component\Translation\Loader\IcuResFileLoader',
			'translation.loader.ts' => 'Symfony\Component\Translation\Loader\QtFileLoader',
			'translation.loader.xlf' => 'Symfony\Component\Translation\Loader\XliffFileLoader',
			'translation.loader.yml' => 'Symfony\Component\Translation\Loader\YamlFileLoader',
			'translation.panel' => 'Kdyby\Translation\Diagnostics\Panel',
			'translation.selector' => 'Symfony\Component\Translation\MessageSelector',
			'translation.userLocaleResolver' => 'Kdyby\Translation\IUserLocaleResolver',
			'translation.userLocaleResolver.acceptHeader' => 'Kdyby\Translation\LocaleResolver\AcceptHeaderResolver',
			'translation.userLocaleResolver.param' => 'Kdyby\Translation\LocaleResolver\LocaleParamResolver',
			'translation.userLocaleResolver.session' => 'Kdyby\Translation\LocaleResolver\SessionResolver',
			'translation.writer' => 'Symfony\Component\Translation\Writer\TranslationWriter',
			'user.LostPasswordFormFactory' => 'UserModule\Factories\LostPasswordFormFactory',
			'user.userFormFactory' => 'UserModule\Factories\UserFormFactory',
			'user.userRepository' => 'UserModule\Repositories\UserRepository',
			'user.userService' => 'UserModule\Services\UserService',
			'visualPaginator.paginator' => 'IPub\VisualPaginator\Components\Control',
		],
		'tags' => [
			'inject' => [
				'application.1' => true,
				'application.10' => true,
				'application.11' => true,
				'application.12' => true,
				'application.13' => true,
				'application.14' => true,
				'application.15' => true,
				'application.16' => true,
				'application.17' => true,
				'application.18' => true,
				'application.19' => true,
				'application.2' => true,
				'application.20' => true,
				'application.21' => true,
				'application.22' => true,
				'application.23' => true,
				'application.24' => true,
				'application.25' => true,
				'application.26' => true,
				'application.27' => true,
				'application.3' => true,
				'application.4' => true,
				'application.5' => true,
				'application.6' => true,
				'application.7' => true,
				'application.8' => true,
				'application.9' => true,
				'doctrine.cli.0' => false,
				'doctrine.cli.1' => false,
				'doctrine.cli.10' => false,
				'doctrine.cli.11' => false,
				'doctrine.cli.12' => false,
				'doctrine.cli.13' => false,
				'doctrine.cli.14' => false,
				'doctrine.cli.15' => false,
				'doctrine.cli.16' => false,
				'doctrine.cli.2' => false,
				'doctrine.cli.3' => false,
				'doctrine.cli.4' => false,
				'doctrine.cli.5' => false,
				'doctrine.cli.6' => false,
				'doctrine.cli.7' => false,
				'doctrine.cli.8' => false,
				'doctrine.cli.9' => false,
				'visualPaginator.paginator' => true,
			],
			'nette.presenter' => [
				'application.1' => 'HelpModule\Presenters\HelpPresenter',
				'application.10' => 'ProjectModule\Presenters\ProjectPresenter',
				'application.11' => 'ProjectModule\Presenters\RestIssuesPresenter',
				'application.12' => 'ProjectModule\Presenters\RestSettingsPresenter',
				'application.13' => 'ProjectModule\Presenters\RestTestExecutionPresenter',
				'application.14' => 'ProjectModule\Presenters\SettingsPresenter',
				'application.15' => 'ProjectModule\Presenters\TestAnalysesPresenter',
				'application.16' => 'ProjectModule\Presenters\TestExecutionPresenter',
				'application.17' => 'ProjectModule\Presenters\TestPlanPresenter',
				'application.18' => 'SettingsModule\Presenters\SimpleSettingsPresenter',
				'application.19' => 'SettingsModule\Presenters\SpecificSettingsPresenter',
				'application.2' => 'HomepageModule\Presenters\HomepagePresenter',
				'application.20' => 'UserModule\Presenters\UserPresenter',
				'application.21' => 'Ublaboo\DataGrid\Tests\Files\ExportTestingPresenter',
				'application.22' => 'Ublaboo\DataGrid\Tests\Files\XTestingPresenter',
				'application.23' => 'App\Presenters\ErrorPresenter',
				'application.24' => 'Front\DomovModule\Presenters\DomovPresenter',
				'application.25' => 'KdybyModule\CliPresenter',
				'application.26' => 'NetteModule\ErrorPresenter',
				'application.27' => 'NetteModule\MicroPresenter',
				'application.3' => 'LogModule\Presenters\LogPresenter',
				'application.4' => 'MailerModule\Presenters\MailerPresenter',
				'application.5' => 'MultimediaModule\Presenters\MultimediaPresenter',
				'application.6' => 'ProfileModule\Presenters\ProfilePresenter',
				'application.7' => 'ProjectModule\Presenters\DashboardPresenter',
				'application.8' => 'ProjectModule\Presenters\IssuesPresenter',
				'application.9' => 'ProjectModule\Presenters\ManagementPresenter',
			],
			'kdyby.console.command' => [
				'doctrine.cli.0' => true,
				'doctrine.cli.1' => true,
				'doctrine.cli.10' => true,
				'doctrine.cli.11' => true,
				'doctrine.cli.12' => true,
				'doctrine.cli.13' => true,
				'doctrine.cli.14' => true,
				'doctrine.cli.15' => true,
				'doctrine.cli.16' => true,
				'doctrine.cli.2' => true,
				'doctrine.cli.3' => true,
				'doctrine.cli.4' => true,
				'doctrine.cli.5' => true,
				'doctrine.cli.6' => true,
				'doctrine.cli.7' => true,
				'doctrine.cli.8' => true,
				'doctrine.cli.9' => true,
				'translation.console.extract' => 'latte',
			],
			'doctrine.connection' => ['doctrine.default.connection' => true],
			'kdyby.doctrine.connection' => ['doctrine.default.connection' => true],
			'doctrine.entityManager' => ['doctrine.default.entityManager' => true],
			'kdyby.doctrine.entityManager' => ['doctrine.default.entityManager' => true],
			'kdyby.console.helper' => [
				'doctrine.helper.connection' => 'db',
				'doctrine.helper.entityManager' => 'em',
			],
			'translation.dumper' => [
				'translation.dumper.csv' => 'csv',
				'translation.dumper.ini' => 'ini',
				'translation.dumper.mo' => 'mo',
				'translation.dumper.neon' => 'neon',
				'translation.dumper.php' => 'php',
				'translation.dumper.po' => 'po',
				'translation.dumper.qt' => 'qt',
				'translation.dumper.res' => 'res',
				'translation.dumper.xliff' => 'xliff',
				'translation.dumper.yml' => 'yml',
			],
			'translation.extractor' => ['translation.extractor.latte' => 'latte'],
			'translation.loader' => [
				'translation.loader.array' => 'array',
				'translation.loader.csv' => 'csv',
				'translation.loader.dat' => 'dat',
				'translation.loader.ini' => 'ini',
				'translation.loader.json' => 'json',
				'translation.loader.mo' => 'mo',
				'translation.loader.neon' => 'neon',
				'translation.loader.php' => 'php',
				'translation.loader.po' => 'po',
				'translation.loader.res' => 'res',
				'translation.loader.ts' => 'ts',
				'translation.loader.xlf' => 'xlf',
				'translation.loader.yml' => 'yml',
			],
			'cms.components' => ['visualPaginator.paginator' => true],
		],
		'aliases' => [
			'application' => 'application.application',
			'cacheStorage' => 'cache.storage',
			'database.default' => 'database.default.connection',
			'doctrine.cacheCleaner' => 'doctrine.default.cacheCleaner',
			'doctrine.schemaManager' => 'doctrine.default.schemaManager',
			'doctrine.schemaTool' => 'doctrine.default.schemaTool',
			'doctrine.schemaValidator' => 'doctrine.default.schemaValidator',
			'httpRequest' => 'http.request',
			'httpResponse' => 'http.response',
			'nette.cacheJournal' => 'cache.journal',
			'nette.database.default' => 'database.default',
			'nette.database.default.context' => 'database.default.context',
			'nette.httpContext' => 'http.context',
			'nette.httpRequestFactory' => 'http.requestFactory',
			'nette.latteFactory' => 'latte.latteFactory',
			'nette.mailer' => 'mail.mailer',
			'nette.presenterFactory' => 'application.presenterFactory',
			'nette.templateFactory' => 'latte.templateFactory',
			'nette.userStorage' => 'security.userStorage',
			'router' => 'routing.router',
			'session' => 'session.session',
			'user' => 'security.user',
		],
	];


	public function __construct(array $params = [])
	{
		$this->parameters = $params;
		$this->parameters += [
			'appDir' => 'C:\MAMP\htdocs\Juno\app',
			'wwwDir' => 'C:\MAMP\htdocs\Juno\www',
			'debugMode' => true,
			'productionMode' => false,
			'consoleMode' => false,
			'tempDir' => 'C:\MAMP\htdocs\Juno\app/../temp',
			'modulesDir' => 'C:\MAMP\htdocs\Juno\app/AdminModule/Modules',
			'createdRoutes' => [
				Nette\PhpGenerator\Helpers::createObject('Nette\Application\Routers\RouteList', [
					"\x00Nette\\Application\\Routers\\RouteList\x00cachedRoutes" => null,
					"\x00Nette\\Application\\Routers\\RouteList\x00module" => 'Admin:Default:',
					"\x00Nette\\Utils\\ArrayList\x00list" => [
						Nette\PhpGenerator\Helpers::createObject('Nette\Application\Routers\Route', [
							"\x00Nette\\Application\\Routers\\Route\x00mask" => '[<locale=sk sk|en>/]admin/default/<presenter>/<action>[/<id>]',
							"\x00Nette\\Application\\Routers\\Route\x00sequence" => [
								'',
								'[',
								'',
								'locale',
								'/',
								']',
								'admin/default/',
								'presenter',
								'/',
								'action',
								'',
								'[',
								'/',
								'id',
								'',
								']',
								'',
							],
							"\x00Nette\\Application\\Routers\\Route\x00re" => '#(?:(?P<p5>(?U)sk|en)/)?admin/default/(?:(?P<p14>(?U)[a-z][a-z0-9.-]*)/(?:(?P<p18>(?U)[a-z][a-z0-9-]*)(?:/(?P<p27>(?U)[^/]+))?)?)?/?\z#A',
							"\x00Nette\\Application\\Routers\\Route\x00aliases" => [
								'p27' => 'id',
								'p18' => 'action',
								'p14' => 'presenter',
								'p5' => 'locale',
							],
							"\x00Nette\\Application\\Routers\\Route\x00metadata" => [
								'presenter' => [
									'value' => 'Default',
									'fixity' => 1,
									'pattern' => '#(?:[a-z][a-z0-9.-]*)\z#A',
									'filterIn' => ['Nette\Application\Routers\Route', 'path2presenter'],
									'filterOut' => ['Nette\Application\Routers\Route', 'presenter2path'],
									'filterTable2' => null,
									'defOut' => 'default',
								],
								'action' => [
									'value' => 'default',
									'fixity' => 1,
									'pattern' => '#(?:[a-z][a-z0-9-]*)\z#A',
									'filterIn' => ['Nette\Application\Routers\Route', 'path2action'],
									'filterOut' => ['Nette\Application\Routers\Route', 'action2path'],
									'filterTable2' => null,
									'defOut' => 'default',
								],
								'id' => [
									'pattern' => '#(?:[^/]+)\z#A',
									'filterOut' => ['Nette\Application\Routers\Route', 'param2path'],
									'filterTable2' => null,
									'defOut' => null,
									'value' => null,
									'fixity' => 1,
								],
								'locale' => [
									'pattern' => '#(?:sk|en)\z#A',
									'filterOut' => ['Nette\Application\Routers\Route', 'param2path'],
									'value' => 'sk',
									'fixity' => 1,
									'filterTable2' => null,
									'defOut' => 'sk',
								],
							],
							"\x00Nette\\Application\\Routers\\Route\x00xlat" => [],
							"\x00Nette\\Application\\Routers\\Route\x00type" => 3,
							"\x00Nette\\Application\\Routers\\Route\x00scheme" => null,
							"\x00Nette\\Application\\Routers\\Route\x00flags" => 0,
							"\x00Nette\\Application\\Routers\\Route\x00lastRefUrl" => null,
							"\x00Nette\\Application\\Routers\\Route\x00lastBaseUrl" => null,
						]),
					],
				]),
				Nette\PhpGenerator\Helpers::createObject('Nette\Application\Routers\RouteList', [
					"\x00Nette\\Application\\Routers\\RouteList\x00cachedRoutes" => null,
					"\x00Nette\\Application\\Routers\\RouteList\x00module" => 'Admin:Default:',
					"\x00Nette\\Utils\\ArrayList\x00list" => [
						Nette\PhpGenerator\Helpers::createObject('Nette\Application\Routers\Route', [
							"\x00Nette\\Application\\Routers\\Route\x00mask" => '[<locale=sk sk|en>/]admin/default/<action>[/<id>]',
							"\x00Nette\\Application\\Routers\\Route\x00sequence" => [
								'',
								'[',
								'',
								'locale',
								'/',
								']',
								'admin/default/',
								'action',
								'',
								'[',
								'/',
								'id',
								'',
								']',
								'',
							],
							"\x00Nette\\Application\\Routers\\Route\x00re" => '#(?:(?P<p5>(?U)sk|en)/)?admin/default/(?:(?P<p14>(?U)[a-z][a-z0-9-]*)(?:/(?P<p23>(?U)[^/]+))?)?/?\z#A',
							"\x00Nette\\Application\\Routers\\Route\x00aliases" => ['p23' => 'id', 'p14' => 'action', 'p5' => 'locale'],
							"\x00Nette\\Application\\Routers\\Route\x00metadata" => [
								'presenter' => ['value' => 'Default', 'fixity' => 2],
								'action' => [
									'value' => 'default',
									'fixity' => 1,
									'pattern' => '#(?:[a-z][a-z0-9-]*)\z#A',
									'filterIn' => ['Nette\Application\Routers\Route', 'path2action'],
									'filterOut' => ['Nette\Application\Routers\Route', 'action2path'],
									'filterTable2' => null,
									'defOut' => 'default',
								],
								'id' => [
									'pattern' => '#(?:[^/]+)\z#A',
									'filterOut' => ['Nette\Application\Routers\Route', 'param2path'],
									'filterTable2' => null,
									'defOut' => null,
									'value' => null,
									'fixity' => 1,
								],
								'locale' => [
									'pattern' => '#(?:sk|en)\z#A',
									'filterOut' => ['Nette\Application\Routers\Route', 'param2path'],
									'value' => 'sk',
									'fixity' => 1,
									'filterTable2' => null,
									'defOut' => 'sk',
								],
							],
							"\x00Nette\\Application\\Routers\\Route\x00xlat" => [],
							"\x00Nette\\Application\\Routers\\Route\x00type" => 3,
							"\x00Nette\\Application\\Routers\\Route\x00scheme" => null,
							"\x00Nette\\Application\\Routers\\Route\x00flags" => 0,
							"\x00Nette\\Application\\Routers\\Route\x00lastRefUrl" => null,
							"\x00Nette\\Application\\Routers\\Route\x00lastBaseUrl" => null,
						]),
					],
				]),
				Nette\PhpGenerator\Helpers::createObject('Nette\Application\Routers\RouteList', [
					"\x00Nette\\Application\\Routers\\RouteList\x00cachedRoutes" => null,
					"\x00Nette\\Application\\Routers\\RouteList\x00module" => 'Admin:Project:',
					"\x00Nette\\Utils\\ArrayList\x00list" => [
						Nette\PhpGenerator\Helpers::createObject('Nette\Application\Routers\Route', [
							"\x00Nette\\Application\\Routers\\Route\x00mask" => '[<locale=sk sk|en>/]admin/project/<presenter>/<action>/<projectID>/<testSprintID>',
							"\x00Nette\\Application\\Routers\\Route\x00sequence" => [
								'',
								'[',
								'',
								'locale',
								'/',
								']',
								'admin/project/',
								'presenter',
								'/',
								'action',
								'/',
								'projectID',
								'/',
								'testSprintID',
								'',
							],
							"\x00Nette\\Application\\Routers\\Route\x00re" => '#(?:(?P<p5>(?U)sk|en)/)?admin/project/(?P<p14>(?U)[a-z][a-z0-9.-]*)/(?P<p18>(?U)[a-z][a-z0-9-]*)/(?P<p22>(?U)[^/]+)/(?P<p26>(?U)[^/]+)/?\z#A',
							"\x00Nette\\Application\\Routers\\Route\x00aliases" => [
								'p26' => 'testSprintID',
								'p22' => 'projectID',
								'p18' => 'action',
								'p14' => 'presenter',
								'p5' => 'locale',
							],
							"\x00Nette\\Application\\Routers\\Route\x00metadata" => [
								'presenter' => [
									'value' => 'TestExecution',
									'fixity' => 1,
									'pattern' => '#(?:[a-z][a-z0-9.-]*)\z#A',
									'filterIn' => ['Nette\Application\Routers\Route', 'path2presenter'],
									'filterOut' => ['Nette\Application\Routers\Route', 'presenter2path'],
									'filterTable2' => null,
									'defOut' => 'test-execution',
								],
								'action' => [
									'value' => 'testSprint',
									'fixity' => 1,
									'pattern' => '#(?:[a-z][a-z0-9-]*)\z#A',
									'filterIn' => ['Nette\Application\Routers\Route', 'path2action'],
									'filterOut' => ['Nette\Application\Routers\Route', 'action2path'],
									'filterTable2' => null,
									'defOut' => 'test-sprint',
								],
								'testSprintID' => [
									'pattern' => '#(?:[^/]+)\z#A',
									'filterOut' => ['Nette\Application\Routers\Route', 'param2path'],
									'filterTable2' => null,
								],
								'projectID' => [
									'pattern' => '#(?:[^/]+)\z#A',
									'filterOut' => ['Nette\Application\Routers\Route', 'param2path'],
									'filterTable2' => null,
								],
								'locale' => [
									'pattern' => '#(?:sk|en)\z#A',
									'filterOut' => ['Nette\Application\Routers\Route', 'param2path'],
									'value' => 'sk',
									'fixity' => 1,
									'filterTable2' => null,
									'defOut' => 'sk',
								],
							],
							"\x00Nette\\Application\\Routers\\Route\x00xlat" => [],
							"\x00Nette\\Application\\Routers\\Route\x00type" => 3,
							"\x00Nette\\Application\\Routers\\Route\x00scheme" => null,
							"\x00Nette\\Application\\Routers\\Route\x00flags" => 0,
							"\x00Nette\\Application\\Routers\\Route\x00lastRefUrl" => null,
							"\x00Nette\\Application\\Routers\\Route\x00lastBaseUrl" => null,
						]),
					],
				]),
				Nette\PhpGenerator\Helpers::createObject('Nette\Application\Routers\RouteList', [
					"\x00Nette\\Application\\Routers\\RouteList\x00cachedRoutes" => null,
					"\x00Nette\\Application\\Routers\\RouteList\x00module" => 'Admin:Project:',
					"\x00Nette\\Utils\\ArrayList\x00list" => [
						Nette\PhpGenerator\Helpers::createObject('Nette\Application\Routers\Route', [
							"\x00Nette\\Application\\Routers\\Route\x00mask" => '[<locale=sk sk|en>/]admin/project/<presenter>/<action>/<projectID>',
							"\x00Nette\\Application\\Routers\\Route\x00sequence" => [
								'',
								'[',
								'',
								'locale',
								'/',
								']',
								'admin/project/',
								'presenter',
								'/',
								'action',
								'/',
								'projectID',
								'',
							],
							"\x00Nette\\Application\\Routers\\Route\x00re" => '#(?:(?P<p5>(?U)sk|en)/)?admin/project/(?P<p14>(?U)[a-z][a-z0-9.-]*)/(?P<p18>(?U)[a-z][a-z0-9-]*)/(?P<p22>(?U)[^/]+)/?\z#A',
							"\x00Nette\\Application\\Routers\\Route\x00aliases" => [
								'p22' => 'projectID',
								'p18' => 'action',
								'p14' => 'presenter',
								'p5' => 'locale',
							],
							"\x00Nette\\Application\\Routers\\Route\x00metadata" => [
								'presenter' => [
									'value' => 'Dashboard',
									'fixity' => 1,
									'pattern' => '#(?:[a-z][a-z0-9.-]*)\z#A',
									'filterIn' => ['Nette\Application\Routers\Route', 'path2presenter'],
									'filterOut' => ['Nette\Application\Routers\Route', 'presenter2path'],
									'filterTable2' => null,
									'defOut' => 'dashboard',
								],
								'action' => [
									'value' => 'default',
									'fixity' => 1,
									'pattern' => '#(?:[a-z][a-z0-9-]*)\z#A',
									'filterIn' => ['Nette\Application\Routers\Route', 'path2action'],
									'filterOut' => ['Nette\Application\Routers\Route', 'action2path'],
									'filterTable2' => null,
									'defOut' => 'default',
								],
								'projectID' => [
									'pattern' => '#(?:[^/]+)\z#A',
									'filterOut' => ['Nette\Application\Routers\Route', 'param2path'],
									'filterTable2' => null,
								],
								'locale' => [
									'pattern' => '#(?:sk|en)\z#A',
									'filterOut' => ['Nette\Application\Routers\Route', 'param2path'],
									'value' => 'sk',
									'fixity' => 1,
									'filterTable2' => null,
									'defOut' => 'sk',
								],
							],
							"\x00Nette\\Application\\Routers\\Route\x00xlat" => [],
							"\x00Nette\\Application\\Routers\\Route\x00type" => 3,
							"\x00Nette\\Application\\Routers\\Route\x00scheme" => null,
							"\x00Nette\\Application\\Routers\\Route\x00flags" => 0,
							"\x00Nette\\Application\\Routers\\Route\x00lastRefUrl" => null,
							"\x00Nette\\Application\\Routers\\Route\x00lastBaseUrl" => null,
						]),
					],
				]),
				Nette\PhpGenerator\Helpers::createObject('Nette\Application\Routers\RouteList', [
					"\x00Nette\\Application\\Routers\\RouteList\x00cachedRoutes" => null,
					"\x00Nette\\Application\\Routers\\RouteList\x00module" => 'Admin:Project:',
					"\x00Nette\\Utils\\ArrayList\x00list" => [
						Nette\PhpGenerator\Helpers::createObject('Nette\Application\Routers\Route', [
							"\x00Nette\\Application\\Routers\\Route\x00mask" => '[<locale=sk sk|en>/]admin/project/<presenter>/<action>[/<id>]',
							"\x00Nette\\Application\\Routers\\Route\x00sequence" => [
								'',
								'[',
								'',
								'locale',
								'/',
								']',
								'admin/project/',
								'presenter',
								'/',
								'action',
								'',
								'[',
								'/',
								'id',
								'',
								']',
								'',
							],
							"\x00Nette\\Application\\Routers\\Route\x00re" => '#(?:(?P<p5>(?U)sk|en)/)?admin/project/(?:(?P<p14>(?U)[a-z][a-z0-9.-]*)/(?:(?P<p18>(?U)[a-z][a-z0-9-]*)(?:/(?P<p27>(?U)[^/]+))?)?)?/?\z#A',
							"\x00Nette\\Application\\Routers\\Route\x00aliases" => [
								'p27' => 'id',
								'p18' => 'action',
								'p14' => 'presenter',
								'p5' => 'locale',
							],
							"\x00Nette\\Application\\Routers\\Route\x00metadata" => [
								'presenter' => [
									'value' => 'Project',
									'fixity' => 1,
									'pattern' => '#(?:[a-z][a-z0-9.-]*)\z#A',
									'filterIn' => ['Nette\Application\Routers\Route', 'path2presenter'],
									'filterOut' => ['Nette\Application\Routers\Route', 'presenter2path'],
									'filterTable2' => null,
									'defOut' => 'project',
								],
								'action' => [
									'value' => 'default',
									'fixity' => 1,
									'pattern' => '#(?:[a-z][a-z0-9-]*)\z#A',
									'filterIn' => ['Nette\Application\Routers\Route', 'path2action'],
									'filterOut' => ['Nette\Application\Routers\Route', 'action2path'],
									'filterTable2' => null,
									'defOut' => 'default',
								],
								'id' => [
									'pattern' => '#(?:[^/]+)\z#A',
									'filterOut' => ['Nette\Application\Routers\Route', 'param2path'],
									'filterTable2' => null,
									'defOut' => null,
									'value' => null,
									'fixity' => 1,
								],
								'locale' => [
									'pattern' => '#(?:sk|en)\z#A',
									'filterOut' => ['Nette\Application\Routers\Route', 'param2path'],
									'value' => 'sk',
									'fixity' => 1,
									'filterTable2' => null,
									'defOut' => 'sk',
								],
							],
							"\x00Nette\\Application\\Routers\\Route\x00xlat" => [],
							"\x00Nette\\Application\\Routers\\Route\x00type" => 3,
							"\x00Nette\\Application\\Routers\\Route\x00scheme" => null,
							"\x00Nette\\Application\\Routers\\Route\x00flags" => 0,
							"\x00Nette\\Application\\Routers\\Route\x00lastRefUrl" => null,
							"\x00Nette\\Application\\Routers\\Route\x00lastBaseUrl" => null,
						]),
					],
				]),
				Nette\PhpGenerator\Helpers::createObject('Nette\Application\Routers\RouteList', [
					"\x00Nette\\Application\\Routers\\RouteList\x00cachedRoutes" => null,
					"\x00Nette\\Application\\Routers\\RouteList\x00module" => 'Admin:Project:',
					"\x00Nette\\Utils\\ArrayList\x00list" => [
						Nette\PhpGenerator\Helpers::createObject('Nette\Application\Routers\Route', [
							"\x00Nette\\Application\\Routers\\Route\x00mask" => '[<locale=sk sk|en>/]admin/project/<action>[/<id>]',
							"\x00Nette\\Application\\Routers\\Route\x00sequence" => [
								'',
								'[',
								'',
								'locale',
								'/',
								']',
								'admin/project/',
								'action',
								'',
								'[',
								'/',
								'id',
								'',
								']',
								'',
							],
							"\x00Nette\\Application\\Routers\\Route\x00re" => '#(?:(?P<p5>(?U)sk|en)/)?admin/project/(?:(?P<p14>(?U)[a-z][a-z0-9-]*)(?:/(?P<p23>(?U)[^/]+))?)?/?\z#A',
							"\x00Nette\\Application\\Routers\\Route\x00aliases" => ['p23' => 'id', 'p14' => 'action', 'p5' => 'locale'],
							"\x00Nette\\Application\\Routers\\Route\x00metadata" => [
								'presenter' => ['value' => 'Project', 'fixity' => 2],
								'action' => [
									'value' => 'default',
									'fixity' => 1,
									'pattern' => '#(?:[a-z][a-z0-9-]*)\z#A',
									'filterIn' => ['Nette\Application\Routers\Route', 'path2action'],
									'filterOut' => ['Nette\Application\Routers\Route', 'action2path'],
									'filterTable2' => null,
									'defOut' => 'default',
								],
								'id' => [
									'pattern' => '#(?:[^/]+)\z#A',
									'filterOut' => ['Nette\Application\Routers\Route', 'param2path'],
									'filterTable2' => null,
									'defOut' => null,
									'value' => null,
									'fixity' => 1,
								],
								'locale' => [
									'pattern' => '#(?:sk|en)\z#A',
									'filterOut' => ['Nette\Application\Routers\Route', 'param2path'],
									'value' => 'sk',
									'fixity' => 1,
									'filterTable2' => null,
									'defOut' => 'sk',
								],
							],
							"\x00Nette\\Application\\Routers\\Route\x00xlat" => [],
							"\x00Nette\\Application\\Routers\\Route\x00type" => 3,
							"\x00Nette\\Application\\Routers\\Route\x00scheme" => null,
							"\x00Nette\\Application\\Routers\\Route\x00flags" => 0,
							"\x00Nette\\Application\\Routers\\Route\x00lastRefUrl" => null,
							"\x00Nette\\Application\\Routers\\Route\x00lastBaseUrl" => null,
						]),
					],
				]),
				Nette\PhpGenerator\Helpers::createObject('Nette\Application\Routers\RouteList', [
					"\x00Nette\\Application\\Routers\\RouteList\x00cachedRoutes" => null,
					"\x00Nette\\Application\\Routers\\RouteList\x00module" => 'Admin:Log:',
					"\x00Nette\\Utils\\ArrayList\x00list" => [
						Nette\PhpGenerator\Helpers::createObject('Nette\Application\Routers\Route', [
							"\x00Nette\\Application\\Routers\\Route\x00mask" => '[<locale=sk sk|en>/]admin/log/<presenter>/<action>[/<id>]',
							"\x00Nette\\Application\\Routers\\Route\x00sequence" => [
								'',
								'[',
								'',
								'locale',
								'/',
								']',
								'admin/log/',
								'presenter',
								'/',
								'action',
								'',
								'[',
								'/',
								'id',
								'',
								']',
								'',
							],
							"\x00Nette\\Application\\Routers\\Route\x00re" => '#(?:(?P<p5>(?U)sk|en)/)?admin/log/(?:(?P<p14>(?U)[a-z][a-z0-9.-]*)/(?:(?P<p18>(?U)[a-z][a-z0-9-]*)(?:/(?P<p27>(?U)[^/]+))?)?)?/?\z#A',
							"\x00Nette\\Application\\Routers\\Route\x00aliases" => [
								'p27' => 'id',
								'p18' => 'action',
								'p14' => 'presenter',
								'p5' => 'locale',
							],
							"\x00Nette\\Application\\Routers\\Route\x00metadata" => [
								'presenter' => [
									'value' => 'Log',
									'fixity' => 1,
									'pattern' => '#(?:[a-z][a-z0-9.-]*)\z#A',
									'filterIn' => ['Nette\Application\Routers\Route', 'path2presenter'],
									'filterOut' => ['Nette\Application\Routers\Route', 'presenter2path'],
									'filterTable2' => null,
									'defOut' => 'log',
								],
								'action' => [
									'value' => 'default',
									'fixity' => 1,
									'pattern' => '#(?:[a-z][a-z0-9-]*)\z#A',
									'filterIn' => ['Nette\Application\Routers\Route', 'path2action'],
									'filterOut' => ['Nette\Application\Routers\Route', 'action2path'],
									'filterTable2' => null,
									'defOut' => 'default',
								],
								'id' => [
									'pattern' => '#(?:[^/]+)\z#A',
									'filterOut' => ['Nette\Application\Routers\Route', 'param2path'],
									'filterTable2' => null,
									'defOut' => null,
									'value' => null,
									'fixity' => 1,
								],
								'locale' => [
									'pattern' => '#(?:sk|en)\z#A',
									'filterOut' => ['Nette\Application\Routers\Route', 'param2path'],
									'value' => 'sk',
									'fixity' => 1,
									'filterTable2' => null,
									'defOut' => 'sk',
								],
							],
							"\x00Nette\\Application\\Routers\\Route\x00xlat" => [],
							"\x00Nette\\Application\\Routers\\Route\x00type" => 3,
							"\x00Nette\\Application\\Routers\\Route\x00scheme" => null,
							"\x00Nette\\Application\\Routers\\Route\x00flags" => 0,
							"\x00Nette\\Application\\Routers\\Route\x00lastRefUrl" => null,
							"\x00Nette\\Application\\Routers\\Route\x00lastBaseUrl" => null,
						]),
					],
				]),
				Nette\PhpGenerator\Helpers::createObject('Nette\Application\Routers\RouteList', [
					"\x00Nette\\Application\\Routers\\RouteList\x00cachedRoutes" => null,
					"\x00Nette\\Application\\Routers\\RouteList\x00module" => 'Admin:Log:',
					"\x00Nette\\Utils\\ArrayList\x00list" => [
						Nette\PhpGenerator\Helpers::createObject('Nette\Application\Routers\Route', [
							"\x00Nette\\Application\\Routers\\Route\x00mask" => '[<locale=sk sk|en>/]admin/log/<action>[/<id>]',
							"\x00Nette\\Application\\Routers\\Route\x00sequence" => [
								'',
								'[',
								'',
								'locale',
								'/',
								']',
								'admin/log/',
								'action',
								'',
								'[',
								'/',
								'id',
								'',
								']',
								'',
							],
							"\x00Nette\\Application\\Routers\\Route\x00re" => '#(?:(?P<p5>(?U)sk|en)/)?admin/log/(?:(?P<p14>(?U)[a-z][a-z0-9-]*)(?:/(?P<p23>(?U)[^/]+))?)?/?\z#A',
							"\x00Nette\\Application\\Routers\\Route\x00aliases" => ['p23' => 'id', 'p14' => 'action', 'p5' => 'locale'],
							"\x00Nette\\Application\\Routers\\Route\x00metadata" => [
								'presenter' => ['value' => 'Log', 'fixity' => 2],
								'action' => [
									'value' => 'default',
									'fixity' => 1,
									'pattern' => '#(?:[a-z][a-z0-9-]*)\z#A',
									'filterIn' => ['Nette\Application\Routers\Route', 'path2action'],
									'filterOut' => ['Nette\Application\Routers\Route', 'action2path'],
									'filterTable2' => null,
									'defOut' => 'default',
								],
								'id' => [
									'pattern' => '#(?:[^/]+)\z#A',
									'filterOut' => ['Nette\Application\Routers\Route', 'param2path'],
									'filterTable2' => null,
									'defOut' => null,
									'value' => null,
									'fixity' => 1,
								],
								'locale' => [
									'pattern' => '#(?:sk|en)\z#A',
									'filterOut' => ['Nette\Application\Routers\Route', 'param2path'],
									'value' => 'sk',
									'fixity' => 1,
									'filterTable2' => null,
									'defOut' => 'sk',
								],
							],
							"\x00Nette\\Application\\Routers\\Route\x00xlat" => [],
							"\x00Nette\\Application\\Routers\\Route\x00type" => 3,
							"\x00Nette\\Application\\Routers\\Route\x00scheme" => null,
							"\x00Nette\\Application\\Routers\\Route\x00flags" => 0,
							"\x00Nette\\Application\\Routers\\Route\x00lastRefUrl" => null,
							"\x00Nette\\Application\\Routers\\Route\x00lastBaseUrl" => null,
						]),
					],
				]),
				Nette\PhpGenerator\Helpers::createObject('Nette\Application\Routers\RouteList', [
					"\x00Nette\\Application\\Routers\\RouteList\x00cachedRoutes" => null,
					"\x00Nette\\Application\\Routers\\RouteList\x00module" => 'Admin:User:',
					"\x00Nette\\Utils\\ArrayList\x00list" => [
						Nette\PhpGenerator\Helpers::createObject('Nette\Application\Routers\Route', [
							"\x00Nette\\Application\\Routers\\Route\x00mask" => '[<locale=sk sk|en>/]admin/user/<presenter>/<action>[/<id>]',
							"\x00Nette\\Application\\Routers\\Route\x00sequence" => [
								'',
								'[',
								'',
								'locale',
								'/',
								']',
								'admin/user/',
								'presenter',
								'/',
								'action',
								'',
								'[',
								'/',
								'id',
								'',
								']',
								'',
							],
							"\x00Nette\\Application\\Routers\\Route\x00re" => '#(?:(?P<p5>(?U)sk|en)/)?admin/user/(?:(?P<p14>(?U)[a-z][a-z0-9.-]*)/(?:(?P<p18>(?U)[a-z][a-z0-9-]*)(?:/(?P<p27>(?U)[^/]+))?)?)?/?\z#A',
							"\x00Nette\\Application\\Routers\\Route\x00aliases" => [
								'p27' => 'id',
								'p18' => 'action',
								'p14' => 'presenter',
								'p5' => 'locale',
							],
							"\x00Nette\\Application\\Routers\\Route\x00metadata" => [
								'presenter' => [
									'value' => 'User',
									'fixity' => 1,
									'pattern' => '#(?:[a-z][a-z0-9.-]*)\z#A',
									'filterIn' => ['Nette\Application\Routers\Route', 'path2presenter'],
									'filterOut' => ['Nette\Application\Routers\Route', 'presenter2path'],
									'filterTable2' => null,
									'defOut' => 'user',
								],
								'action' => [
									'value' => 'default',
									'fixity' => 1,
									'pattern' => '#(?:[a-z][a-z0-9-]*)\z#A',
									'filterIn' => ['Nette\Application\Routers\Route', 'path2action'],
									'filterOut' => ['Nette\Application\Routers\Route', 'action2path'],
									'filterTable2' => null,
									'defOut' => 'default',
								],
								'id' => [
									'pattern' => '#(?:[^/]+)\z#A',
									'filterOut' => ['Nette\Application\Routers\Route', 'param2path'],
									'filterTable2' => null,
									'defOut' => null,
									'value' => null,
									'fixity' => 1,
								],
								'locale' => [
									'pattern' => '#(?:sk|en)\z#A',
									'filterOut' => ['Nette\Application\Routers\Route', 'param2path'],
									'value' => 'sk',
									'fixity' => 1,
									'filterTable2' => null,
									'defOut' => 'sk',
								],
							],
							"\x00Nette\\Application\\Routers\\Route\x00xlat" => [],
							"\x00Nette\\Application\\Routers\\Route\x00type" => 3,
							"\x00Nette\\Application\\Routers\\Route\x00scheme" => null,
							"\x00Nette\\Application\\Routers\\Route\x00flags" => 0,
							"\x00Nette\\Application\\Routers\\Route\x00lastRefUrl" => null,
							"\x00Nette\\Application\\Routers\\Route\x00lastBaseUrl" => null,
						]),
					],
				]),
				Nette\PhpGenerator\Helpers::createObject('Nette\Application\Routers\RouteList', [
					"\x00Nette\\Application\\Routers\\RouteList\x00cachedRoutes" => null,
					"\x00Nette\\Application\\Routers\\RouteList\x00module" => 'Admin:User:',
					"\x00Nette\\Utils\\ArrayList\x00list" => [
						Nette\PhpGenerator\Helpers::createObject('Nette\Application\Routers\Route', [
							"\x00Nette\\Application\\Routers\\Route\x00mask" => '[<locale=sk sk|en>/]admin/user/<action>[/<id>]',
							"\x00Nette\\Application\\Routers\\Route\x00sequence" => [
								'',
								'[',
								'',
								'locale',
								'/',
								']',
								'admin/user/',
								'action',
								'',
								'[',
								'/',
								'id',
								'',
								']',
								'',
							],
							"\x00Nette\\Application\\Routers\\Route\x00re" => '#(?:(?P<p5>(?U)sk|en)/)?admin/user/(?:(?P<p14>(?U)[a-z][a-z0-9-]*)(?:/(?P<p23>(?U)[^/]+))?)?/?\z#A',
							"\x00Nette\\Application\\Routers\\Route\x00aliases" => ['p23' => 'id', 'p14' => 'action', 'p5' => 'locale'],
							"\x00Nette\\Application\\Routers\\Route\x00metadata" => [
								'presenter' => ['value' => 'User', 'fixity' => 2],
								'action' => [
									'value' => 'default',
									'fixity' => 1,
									'pattern' => '#(?:[a-z][a-z0-9-]*)\z#A',
									'filterIn' => ['Nette\Application\Routers\Route', 'path2action'],
									'filterOut' => ['Nette\Application\Routers\Route', 'action2path'],
									'filterTable2' => null,
									'defOut' => 'default',
								],
								'id' => [
									'pattern' => '#(?:[^/]+)\z#A',
									'filterOut' => ['Nette\Application\Routers\Route', 'param2path'],
									'filterTable2' => null,
									'defOut' => null,
									'value' => null,
									'fixity' => 1,
								],
								'locale' => [
									'pattern' => '#(?:sk|en)\z#A',
									'filterOut' => ['Nette\Application\Routers\Route', 'param2path'],
									'value' => 'sk',
									'fixity' => 1,
									'filterTable2' => null,
									'defOut' => 'sk',
								],
							],
							"\x00Nette\\Application\\Routers\\Route\x00xlat" => [],
							"\x00Nette\\Application\\Routers\\Route\x00type" => 3,
							"\x00Nette\\Application\\Routers\\Route\x00scheme" => null,
							"\x00Nette\\Application\\Routers\\Route\x00flags" => 0,
							"\x00Nette\\Application\\Routers\\Route\x00lastRefUrl" => null,
							"\x00Nette\\Application\\Routers\\Route\x00lastBaseUrl" => null,
						]),
					],
				]),
				Nette\PhpGenerator\Helpers::createObject('Nette\Application\Routers\RouteList', [
					"\x00Nette\\Application\\Routers\\RouteList\x00cachedRoutes" => null,
					"\x00Nette\\Application\\Routers\\RouteList\x00module" => 'Admin:Client:',
					"\x00Nette\\Utils\\ArrayList\x00list" => [
						Nette\PhpGenerator\Helpers::createObject('Nette\Application\Routers\Route', [
							"\x00Nette\\Application\\Routers\\Route\x00mask" => '[<locale=sk sk|en>/]admin/client/<presenter>/<action>[/<id>]',
							"\x00Nette\\Application\\Routers\\Route\x00sequence" => [
								'',
								'[',
								'',
								'locale',
								'/',
								']',
								'admin/client/',
								'presenter',
								'/',
								'action',
								'',
								'[',
								'/',
								'id',
								'',
								']',
								'',
							],
							"\x00Nette\\Application\\Routers\\Route\x00re" => '#(?:(?P<p5>(?U)sk|en)/)?admin/client/(?:(?P<p14>(?U)[a-z][a-z0-9.-]*)/(?:(?P<p18>(?U)[a-z][a-z0-9-]*)(?:/(?P<p27>(?U)[^/]+))?)?)?/?\z#A',
							"\x00Nette\\Application\\Routers\\Route\x00aliases" => [
								'p27' => 'id',
								'p18' => 'action',
								'p14' => 'presenter',
								'p5' => 'locale',
							],
							"\x00Nette\\Application\\Routers\\Route\x00metadata" => [
								'presenter' => [
									'value' => 'Client',
									'fixity' => 1,
									'pattern' => '#(?:[a-z][a-z0-9.-]*)\z#A',
									'filterIn' => ['Nette\Application\Routers\Route', 'path2presenter'],
									'filterOut' => ['Nette\Application\Routers\Route', 'presenter2path'],
									'filterTable2' => null,
									'defOut' => 'client',
								],
								'action' => [
									'value' => 'default',
									'fixity' => 1,
									'pattern' => '#(?:[a-z][a-z0-9-]*)\z#A',
									'filterIn' => ['Nette\Application\Routers\Route', 'path2action'],
									'filterOut' => ['Nette\Application\Routers\Route', 'action2path'],
									'filterTable2' => null,
									'defOut' => 'default',
								],
								'id' => [
									'pattern' => '#(?:[^/]+)\z#A',
									'filterOut' => ['Nette\Application\Routers\Route', 'param2path'],
									'filterTable2' => null,
									'defOut' => null,
									'value' => null,
									'fixity' => 1,
								],
								'locale' => [
									'pattern' => '#(?:sk|en)\z#A',
									'filterOut' => ['Nette\Application\Routers\Route', 'param2path'],
									'value' => 'sk',
									'fixity' => 1,
									'filterTable2' => null,
									'defOut' => 'sk',
								],
							],
							"\x00Nette\\Application\\Routers\\Route\x00xlat" => [],
							"\x00Nette\\Application\\Routers\\Route\x00type" => 3,
							"\x00Nette\\Application\\Routers\\Route\x00scheme" => null,
							"\x00Nette\\Application\\Routers\\Route\x00flags" => 0,
							"\x00Nette\\Application\\Routers\\Route\x00lastRefUrl" => null,
							"\x00Nette\\Application\\Routers\\Route\x00lastBaseUrl" => null,
						]),
					],
				]),
				Nette\PhpGenerator\Helpers::createObject('Nette\Application\Routers\RouteList', [
					"\x00Nette\\Application\\Routers\\RouteList\x00cachedRoutes" => null,
					"\x00Nette\\Application\\Routers\\RouteList\x00module" => 'Admin:Client:',
					"\x00Nette\\Utils\\ArrayList\x00list" => [
						Nette\PhpGenerator\Helpers::createObject('Nette\Application\Routers\Route', [
							"\x00Nette\\Application\\Routers\\Route\x00mask" => '[<locale=sk sk|en>/]admin/client/<action>[/<id>]',
							"\x00Nette\\Application\\Routers\\Route\x00sequence" => [
								'',
								'[',
								'',
								'locale',
								'/',
								']',
								'admin/client/',
								'action',
								'',
								'[',
								'/',
								'id',
								'',
								']',
								'',
							],
							"\x00Nette\\Application\\Routers\\Route\x00re" => '#(?:(?P<p5>(?U)sk|en)/)?admin/client/(?:(?P<p14>(?U)[a-z][a-z0-9-]*)(?:/(?P<p23>(?U)[^/]+))?)?/?\z#A',
							"\x00Nette\\Application\\Routers\\Route\x00aliases" => ['p23' => 'id', 'p14' => 'action', 'p5' => 'locale'],
							"\x00Nette\\Application\\Routers\\Route\x00metadata" => [
								'presenter' => ['value' => 'Client', 'fixity' => 2],
								'action' => [
									'value' => 'default',
									'fixity' => 1,
									'pattern' => '#(?:[a-z][a-z0-9-]*)\z#A',
									'filterIn' => ['Nette\Application\Routers\Route', 'path2action'],
									'filterOut' => ['Nette\Application\Routers\Route', 'action2path'],
									'filterTable2' => null,
									'defOut' => 'default',
								],
								'id' => [
									'pattern' => '#(?:[^/]+)\z#A',
									'filterOut' => ['Nette\Application\Routers\Route', 'param2path'],
									'filterTable2' => null,
									'defOut' => null,
									'value' => null,
									'fixity' => 1,
								],
								'locale' => [
									'pattern' => '#(?:sk|en)\z#A',
									'filterOut' => ['Nette\Application\Routers\Route', 'param2path'],
									'value' => 'sk',
									'fixity' => 1,
									'filterTable2' => null,
									'defOut' => 'sk',
								],
							],
							"\x00Nette\\Application\\Routers\\Route\x00xlat" => [],
							"\x00Nette\\Application\\Routers\\Route\x00type" => 3,
							"\x00Nette\\Application\\Routers\\Route\x00scheme" => null,
							"\x00Nette\\Application\\Routers\\Route\x00flags" => 0,
							"\x00Nette\\Application\\Routers\\Route\x00lastRefUrl" => null,
							"\x00Nette\\Application\\Routers\\Route\x00lastBaseUrl" => null,
						]),
					],
				]),
				Nette\PhpGenerator\Helpers::createObject('Nette\Application\Routers\RouteList', [
					"\x00Nette\\Application\\Routers\\RouteList\x00cachedRoutes" => null,
					"\x00Nette\\Application\\Routers\\RouteList\x00module" => 'Admin:Settings:',
					"\x00Nette\\Utils\\ArrayList\x00list" => [
						Nette\PhpGenerator\Helpers::createObject('Nette\Application\Routers\Route', [
							"\x00Nette\\Application\\Routers\\Route\x00mask" => '[<locale=sk sk|en>/]admin/settings/<presenter>/<action>[/<id>]',
							"\x00Nette\\Application\\Routers\\Route\x00sequence" => [
								'',
								'[',
								'',
								'locale',
								'/',
								']',
								'admin/settings/',
								'presenter',
								'/',
								'action',
								'',
								'[',
								'/',
								'id',
								'',
								']',
								'',
							],
							"\x00Nette\\Application\\Routers\\Route\x00re" => '#(?:(?P<p5>(?U)sk|en)/)?admin/settings/(?:(?P<p14>(?U)[a-z][a-z0-9.-]*)/(?:(?P<p18>(?U)[a-z][a-z0-9-]*)(?:/(?P<p27>(?U)[^/]+))?)?)?/?\z#A',
							"\x00Nette\\Application\\Routers\\Route\x00aliases" => [
								'p27' => 'id',
								'p18' => 'action',
								'p14' => 'presenter',
								'p5' => 'locale',
							],
							"\x00Nette\\Application\\Routers\\Route\x00metadata" => [
								'presenter' => [
									'value' => 'Settings',
									'fixity' => 1,
									'pattern' => '#(?:[a-z][a-z0-9.-]*)\z#A',
									'filterIn' => ['Nette\Application\Routers\Route', 'path2presenter'],
									'filterOut' => ['Nette\Application\Routers\Route', 'presenter2path'],
									'filterTable2' => null,
									'defOut' => 'settings',
								],
								'action' => [
									'value' => 'default',
									'fixity' => 1,
									'pattern' => '#(?:[a-z][a-z0-9-]*)\z#A',
									'filterIn' => ['Nette\Application\Routers\Route', 'path2action'],
									'filterOut' => ['Nette\Application\Routers\Route', 'action2path'],
									'filterTable2' => null,
									'defOut' => 'default',
								],
								'id' => [
									'pattern' => '#(?:[^/]+)\z#A',
									'filterOut' => ['Nette\Application\Routers\Route', 'param2path'],
									'filterTable2' => null,
									'defOut' => null,
									'value' => null,
									'fixity' => 1,
								],
								'locale' => [
									'pattern' => '#(?:sk|en)\z#A',
									'filterOut' => ['Nette\Application\Routers\Route', 'param2path'],
									'value' => 'sk',
									'fixity' => 1,
									'filterTable2' => null,
									'defOut' => 'sk',
								],
							],
							"\x00Nette\\Application\\Routers\\Route\x00xlat" => [],
							"\x00Nette\\Application\\Routers\\Route\x00type" => 3,
							"\x00Nette\\Application\\Routers\\Route\x00scheme" => null,
							"\x00Nette\\Application\\Routers\\Route\x00flags" => 0,
							"\x00Nette\\Application\\Routers\\Route\x00lastRefUrl" => null,
							"\x00Nette\\Application\\Routers\\Route\x00lastBaseUrl" => null,
						]),
					],
				]),
				Nette\PhpGenerator\Helpers::createObject('Nette\Application\Routers\RouteList', [
					"\x00Nette\\Application\\Routers\\RouteList\x00cachedRoutes" => null,
					"\x00Nette\\Application\\Routers\\RouteList\x00module" => 'Admin:Settings:',
					"\x00Nette\\Utils\\ArrayList\x00list" => [
						Nette\PhpGenerator\Helpers::createObject('Nette\Application\Routers\Route', [
							"\x00Nette\\Application\\Routers\\Route\x00mask" => '[<locale=sk sk|en>/]admin/settings/<action>[/<id>]',
							"\x00Nette\\Application\\Routers\\Route\x00sequence" => [
								'',
								'[',
								'',
								'locale',
								'/',
								']',
								'admin/settings/',
								'action',
								'',
								'[',
								'/',
								'id',
								'',
								']',
								'',
							],
							"\x00Nette\\Application\\Routers\\Route\x00re" => '#(?:(?P<p5>(?U)sk|en)/)?admin/settings/(?:(?P<p14>(?U)[a-z][a-z0-9-]*)(?:/(?P<p23>(?U)[^/]+))?)?/?\z#A',
							"\x00Nette\\Application\\Routers\\Route\x00aliases" => ['p23' => 'id', 'p14' => 'action', 'p5' => 'locale'],
							"\x00Nette\\Application\\Routers\\Route\x00metadata" => [
								'presenter' => ['value' => 'Settings', 'fixity' => 2],
								'action' => [
									'value' => 'default',
									'fixity' => 1,
									'pattern' => '#(?:[a-z][a-z0-9-]*)\z#A',
									'filterIn' => ['Nette\Application\Routers\Route', 'path2action'],
									'filterOut' => ['Nette\Application\Routers\Route', 'action2path'],
									'filterTable2' => null,
									'defOut' => 'default',
								],
								'id' => [
									'pattern' => '#(?:[^/]+)\z#A',
									'filterOut' => ['Nette\Application\Routers\Route', 'param2path'],
									'filterTable2' => null,
									'defOut' => null,
									'value' => null,
									'fixity' => 1,
								],
								'locale' => [
									'pattern' => '#(?:sk|en)\z#A',
									'filterOut' => ['Nette\Application\Routers\Route', 'param2path'],
									'value' => 'sk',
									'fixity' => 1,
									'filterTable2' => null,
									'defOut' => 'sk',
								],
							],
							"\x00Nette\\Application\\Routers\\Route\x00xlat" => [],
							"\x00Nette\\Application\\Routers\\Route\x00type" => 3,
							"\x00Nette\\Application\\Routers\\Route\x00scheme" => null,
							"\x00Nette\\Application\\Routers\\Route\x00flags" => 0,
							"\x00Nette\\Application\\Routers\\Route\x00lastRefUrl" => null,
							"\x00Nette\\Application\\Routers\\Route\x00lastBaseUrl" => null,
						]),
					],
				]),
				Nette\PhpGenerator\Helpers::createObject('Nette\Application\Routers\RouteList', [
					"\x00Nette\\Application\\Routers\\RouteList\x00cachedRoutes" => null,
					"\x00Nette\\Application\\Routers\\RouteList\x00module" => 'Admin:Help:',
					"\x00Nette\\Utils\\ArrayList\x00list" => [
						Nette\PhpGenerator\Helpers::createObject('Nette\Application\Routers\Route', [
							"\x00Nette\\Application\\Routers\\Route\x00mask" => '[<locale=sk sk|en>/]admin/help/<presenter>/<action>[/<id>]',
							"\x00Nette\\Application\\Routers\\Route\x00sequence" => [
								'',
								'[',
								'',
								'locale',
								'/',
								']',
								'admin/help/',
								'presenter',
								'/',
								'action',
								'',
								'[',
								'/',
								'id',
								'',
								']',
								'',
							],
							"\x00Nette\\Application\\Routers\\Route\x00re" => '#(?:(?P<p5>(?U)sk|en)/)?admin/help/(?:(?P<p14>(?U)[a-z][a-z0-9.-]*)/(?:(?P<p18>(?U)[a-z][a-z0-9-]*)(?:/(?P<p27>(?U)[^/]+))?)?)?/?\z#A',
							"\x00Nette\\Application\\Routers\\Route\x00aliases" => [
								'p27' => 'id',
								'p18' => 'action',
								'p14' => 'presenter',
								'p5' => 'locale',
							],
							"\x00Nette\\Application\\Routers\\Route\x00metadata" => [
								'presenter' => [
									'value' => 'Help',
									'fixity' => 1,
									'pattern' => '#(?:[a-z][a-z0-9.-]*)\z#A',
									'filterIn' => ['Nette\Application\Routers\Route', 'path2presenter'],
									'filterOut' => ['Nette\Application\Routers\Route', 'presenter2path'],
									'filterTable2' => null,
									'defOut' => 'help',
								],
								'action' => [
									'value' => 'default',
									'fixity' => 1,
									'pattern' => '#(?:[a-z][a-z0-9-]*)\z#A',
									'filterIn' => ['Nette\Application\Routers\Route', 'path2action'],
									'filterOut' => ['Nette\Application\Routers\Route', 'action2path'],
									'filterTable2' => null,
									'defOut' => 'default',
								],
								'id' => [
									'pattern' => '#(?:[^/]+)\z#A',
									'filterOut' => ['Nette\Application\Routers\Route', 'param2path'],
									'filterTable2' => null,
									'defOut' => null,
									'value' => null,
									'fixity' => 1,
								],
								'locale' => [
									'pattern' => '#(?:sk|en)\z#A',
									'filterOut' => ['Nette\Application\Routers\Route', 'param2path'],
									'value' => 'sk',
									'fixity' => 1,
									'filterTable2' => null,
									'defOut' => 'sk',
								],
							],
							"\x00Nette\\Application\\Routers\\Route\x00xlat" => [],
							"\x00Nette\\Application\\Routers\\Route\x00type" => 3,
							"\x00Nette\\Application\\Routers\\Route\x00scheme" => null,
							"\x00Nette\\Application\\Routers\\Route\x00flags" => 0,
							"\x00Nette\\Application\\Routers\\Route\x00lastRefUrl" => null,
							"\x00Nette\\Application\\Routers\\Route\x00lastBaseUrl" => null,
						]),
					],
				]),
				Nette\PhpGenerator\Helpers::createObject('Nette\Application\Routers\RouteList', [
					"\x00Nette\\Application\\Routers\\RouteList\x00cachedRoutes" => null,
					"\x00Nette\\Application\\Routers\\RouteList\x00module" => 'Admin:Help:',
					"\x00Nette\\Utils\\ArrayList\x00list" => [
						Nette\PhpGenerator\Helpers::createObject('Nette\Application\Routers\Route', [
							"\x00Nette\\Application\\Routers\\Route\x00mask" => '[<locale=sk sk|en>/]admin/help/<action>[/<id>]',
							"\x00Nette\\Application\\Routers\\Route\x00sequence" => [
								'',
								'[',
								'',
								'locale',
								'/',
								']',
								'admin/help/',
								'action',
								'',
								'[',
								'/',
								'id',
								'',
								']',
								'',
							],
							"\x00Nette\\Application\\Routers\\Route\x00re" => '#(?:(?P<p5>(?U)sk|en)/)?admin/help/(?:(?P<p14>(?U)[a-z][a-z0-9-]*)(?:/(?P<p23>(?U)[^/]+))?)?/?\z#A',
							"\x00Nette\\Application\\Routers\\Route\x00aliases" => ['p23' => 'id', 'p14' => 'action', 'p5' => 'locale'],
							"\x00Nette\\Application\\Routers\\Route\x00metadata" => [
								'presenter' => ['value' => 'Help', 'fixity' => 2],
								'action' => [
									'value' => 'default',
									'fixity' => 1,
									'pattern' => '#(?:[a-z][a-z0-9-]*)\z#A',
									'filterIn' => ['Nette\Application\Routers\Route', 'path2action'],
									'filterOut' => ['Nette\Application\Routers\Route', 'action2path'],
									'filterTable2' => null,
									'defOut' => 'default',
								],
								'id' => [
									'pattern' => '#(?:[^/]+)\z#A',
									'filterOut' => ['Nette\Application\Routers\Route', 'param2path'],
									'filterTable2' => null,
									'defOut' => null,
									'value' => null,
									'fixity' => 1,
								],
								'locale' => [
									'pattern' => '#(?:sk|en)\z#A',
									'filterOut' => ['Nette\Application\Routers\Route', 'param2path'],
									'value' => 'sk',
									'fixity' => 1,
									'filterTable2' => null,
									'defOut' => 'sk',
								],
							],
							"\x00Nette\\Application\\Routers\\Route\x00xlat" => [],
							"\x00Nette\\Application\\Routers\\Route\x00type" => 3,
							"\x00Nette\\Application\\Routers\\Route\x00scheme" => null,
							"\x00Nette\\Application\\Routers\\Route\x00flags" => 0,
							"\x00Nette\\Application\\Routers\\Route\x00lastRefUrl" => null,
							"\x00Nette\\Application\\Routers\\Route\x00lastBaseUrl" => null,
						]),
					],
				]),
				Nette\PhpGenerator\Helpers::createObject('Nette\Application\Routers\RouteList', [
					"\x00Nette\\Application\\Routers\\RouteList\x00cachedRoutes" => null,
					"\x00Nette\\Application\\Routers\\RouteList\x00module" => 'Admin:Mailer:',
					"\x00Nette\\Utils\\ArrayList\x00list" => [
						Nette\PhpGenerator\Helpers::createObject('Nette\Application\Routers\Route', [
							"\x00Nette\\Application\\Routers\\Route\x00mask" => '[<locale=sk sk|en>/]admin/mailer/<presenter>/<action>[/<id>]',
							"\x00Nette\\Application\\Routers\\Route\x00sequence" => [
								'',
								'[',
								'',
								'locale',
								'/',
								']',
								'admin/mailer/',
								'presenter',
								'/',
								'action',
								'',
								'[',
								'/',
								'id',
								'',
								']',
								'',
							],
							"\x00Nette\\Application\\Routers\\Route\x00re" => '#(?:(?P<p5>(?U)sk|en)/)?admin/mailer/(?:(?P<p14>(?U)[a-z][a-z0-9.-]*)/(?:(?P<p18>(?U)[a-z][a-z0-9-]*)(?:/(?P<p27>(?U)[^/]+))?)?)?/?\z#A',
							"\x00Nette\\Application\\Routers\\Route\x00aliases" => [
								'p27' => 'id',
								'p18' => 'action',
								'p14' => 'presenter',
								'p5' => 'locale',
							],
							"\x00Nette\\Application\\Routers\\Route\x00metadata" => [
								'presenter' => [
									'value' => 'Mailer',
									'fixity' => 1,
									'pattern' => '#(?:[a-z][a-z0-9.-]*)\z#A',
									'filterIn' => ['Nette\Application\Routers\Route', 'path2presenter'],
									'filterOut' => ['Nette\Application\Routers\Route', 'presenter2path'],
									'filterTable2' => null,
									'defOut' => 'mailer',
								],
								'action' => [
									'value' => 'default',
									'fixity' => 1,
									'pattern' => '#(?:[a-z][a-z0-9-]*)\z#A',
									'filterIn' => ['Nette\Application\Routers\Route', 'path2action'],
									'filterOut' => ['Nette\Application\Routers\Route', 'action2path'],
									'filterTable2' => null,
									'defOut' => 'default',
								],
								'id' => [
									'pattern' => '#(?:[^/]+)\z#A',
									'filterOut' => ['Nette\Application\Routers\Route', 'param2path'],
									'filterTable2' => null,
									'defOut' => null,
									'value' => null,
									'fixity' => 1,
								],
								'locale' => [
									'pattern' => '#(?:sk|en)\z#A',
									'filterOut' => ['Nette\Application\Routers\Route', 'param2path'],
									'value' => 'sk',
									'fixity' => 1,
									'filterTable2' => null,
									'defOut' => 'sk',
								],
							],
							"\x00Nette\\Application\\Routers\\Route\x00xlat" => [],
							"\x00Nette\\Application\\Routers\\Route\x00type" => 3,
							"\x00Nette\\Application\\Routers\\Route\x00scheme" => null,
							"\x00Nette\\Application\\Routers\\Route\x00flags" => 0,
							"\x00Nette\\Application\\Routers\\Route\x00lastRefUrl" => null,
							"\x00Nette\\Application\\Routers\\Route\x00lastBaseUrl" => null,
						]),
					],
				]),
				Nette\PhpGenerator\Helpers::createObject('Nette\Application\Routers\RouteList', [
					"\x00Nette\\Application\\Routers\\RouteList\x00cachedRoutes" => null,
					"\x00Nette\\Application\\Routers\\RouteList\x00module" => 'Admin:Mailer:',
					"\x00Nette\\Utils\\ArrayList\x00list" => [
						Nette\PhpGenerator\Helpers::createObject('Nette\Application\Routers\Route', [
							"\x00Nette\\Application\\Routers\\Route\x00mask" => '[<locale=sk sk|en>/]admin/mailer/<action>[/<id>]',
							"\x00Nette\\Application\\Routers\\Route\x00sequence" => [
								'',
								'[',
								'',
								'locale',
								'/',
								']',
								'admin/mailer/',
								'action',
								'',
								'[',
								'/',
								'id',
								'',
								']',
								'',
							],
							"\x00Nette\\Application\\Routers\\Route\x00re" => '#(?:(?P<p5>(?U)sk|en)/)?admin/mailer/(?:(?P<p14>(?U)[a-z][a-z0-9-]*)(?:/(?P<p23>(?U)[^/]+))?)?/?\z#A',
							"\x00Nette\\Application\\Routers\\Route\x00aliases" => ['p23' => 'id', 'p14' => 'action', 'p5' => 'locale'],
							"\x00Nette\\Application\\Routers\\Route\x00metadata" => [
								'presenter' => ['value' => 'Mailer', 'fixity' => 2],
								'action' => [
									'value' => 'default',
									'fixity' => 1,
									'pattern' => '#(?:[a-z][a-z0-9-]*)\z#A',
									'filterIn' => ['Nette\Application\Routers\Route', 'path2action'],
									'filterOut' => ['Nette\Application\Routers\Route', 'action2path'],
									'filterTable2' => null,
									'defOut' => 'default',
								],
								'id' => [
									'pattern' => '#(?:[^/]+)\z#A',
									'filterOut' => ['Nette\Application\Routers\Route', 'param2path'],
									'filterTable2' => null,
									'defOut' => null,
									'value' => null,
									'fixity' => 1,
								],
								'locale' => [
									'pattern' => '#(?:sk|en)\z#A',
									'filterOut' => ['Nette\Application\Routers\Route', 'param2path'],
									'value' => 'sk',
									'fixity' => 1,
									'filterTable2' => null,
									'defOut' => 'sk',
								],
							],
							"\x00Nette\\Application\\Routers\\Route\x00xlat" => [],
							"\x00Nette\\Application\\Routers\\Route\x00type" => 3,
							"\x00Nette\\Application\\Routers\\Route\x00scheme" => null,
							"\x00Nette\\Application\\Routers\\Route\x00flags" => 0,
							"\x00Nette\\Application\\Routers\\Route\x00lastRefUrl" => null,
							"\x00Nette\\Application\\Routers\\Route\x00lastBaseUrl" => null,
						]),
					],
				]),
				Nette\PhpGenerator\Helpers::createObject('Nette\Application\Routers\RouteList', [
					"\x00Nette\\Application\\Routers\\RouteList\x00cachedRoutes" => null,
					"\x00Nette\\Application\\Routers\\RouteList\x00module" => 'Admin:Multimedia:',
					"\x00Nette\\Utils\\ArrayList\x00list" => [
						Nette\PhpGenerator\Helpers::createObject('Nette\Application\Routers\Route', [
							"\x00Nette\\Application\\Routers\\Route\x00mask" => '[<locale=sk sk|en>/]admin/multimedia/<presenter>/<action>[/<id>]',
							"\x00Nette\\Application\\Routers\\Route\x00sequence" => [
								'',
								'[',
								'',
								'locale',
								'/',
								']',
								'admin/multimedia/',
								'presenter',
								'/',
								'action',
								'',
								'[',
								'/',
								'id',
								'',
								']',
								'',
							],
							"\x00Nette\\Application\\Routers\\Route\x00re" => '#(?:(?P<p5>(?U)sk|en)/)?admin/multimedia/(?:(?P<p14>(?U)[a-z][a-z0-9.-]*)/(?:(?P<p18>(?U)[a-z][a-z0-9-]*)(?:/(?P<p27>(?U)[^/]+))?)?)?/?\z#A',
							"\x00Nette\\Application\\Routers\\Route\x00aliases" => [
								'p27' => 'id',
								'p18' => 'action',
								'p14' => 'presenter',
								'p5' => 'locale',
							],
							"\x00Nette\\Application\\Routers\\Route\x00metadata" => [
								'presenter' => [
									'value' => 'Multimedia',
									'fixity' => 1,
									'pattern' => '#(?:[a-z][a-z0-9.-]*)\z#A',
									'filterIn' => ['Nette\Application\Routers\Route', 'path2presenter'],
									'filterOut' => ['Nette\Application\Routers\Route', 'presenter2path'],
									'filterTable2' => null,
									'defOut' => 'multimedia',
								],
								'action' => [
									'value' => 'default',
									'fixity' => 1,
									'pattern' => '#(?:[a-z][a-z0-9-]*)\z#A',
									'filterIn' => ['Nette\Application\Routers\Route', 'path2action'],
									'filterOut' => ['Nette\Application\Routers\Route', 'action2path'],
									'filterTable2' => null,
									'defOut' => 'default',
								],
								'id' => [
									'pattern' => '#(?:[^/]+)\z#A',
									'filterOut' => ['Nette\Application\Routers\Route', 'param2path'],
									'filterTable2' => null,
									'defOut' => null,
									'value' => null,
									'fixity' => 1,
								],
								'locale' => [
									'pattern' => '#(?:sk|en)\z#A',
									'filterOut' => ['Nette\Application\Routers\Route', 'param2path'],
									'value' => 'sk',
									'fixity' => 1,
									'filterTable2' => null,
									'defOut' => 'sk',
								],
							],
							"\x00Nette\\Application\\Routers\\Route\x00xlat" => [],
							"\x00Nette\\Application\\Routers\\Route\x00type" => 3,
							"\x00Nette\\Application\\Routers\\Route\x00scheme" => null,
							"\x00Nette\\Application\\Routers\\Route\x00flags" => 0,
							"\x00Nette\\Application\\Routers\\Route\x00lastRefUrl" => null,
							"\x00Nette\\Application\\Routers\\Route\x00lastBaseUrl" => null,
						]),
					],
				]),
				Nette\PhpGenerator\Helpers::createObject('Nette\Application\Routers\RouteList', [
					"\x00Nette\\Application\\Routers\\RouteList\x00cachedRoutes" => null,
					"\x00Nette\\Application\\Routers\\RouteList\x00module" => 'Admin:Multimedia:',
					"\x00Nette\\Utils\\ArrayList\x00list" => [
						Nette\PhpGenerator\Helpers::createObject('Nette\Application\Routers\Route', [
							"\x00Nette\\Application\\Routers\\Route\x00mask" => '[<locale=sk sk|en>/]admin/multimedia/<action>[/<id>]',
							"\x00Nette\\Application\\Routers\\Route\x00sequence" => [
								'',
								'[',
								'',
								'locale',
								'/',
								']',
								'admin/multimedia/',
								'action',
								'',
								'[',
								'/',
								'id',
								'',
								']',
								'',
							],
							"\x00Nette\\Application\\Routers\\Route\x00re" => '#(?:(?P<p5>(?U)sk|en)/)?admin/multimedia/(?:(?P<p14>(?U)[a-z][a-z0-9-]*)(?:/(?P<p23>(?U)[^/]+))?)?/?\z#A',
							"\x00Nette\\Application\\Routers\\Route\x00aliases" => ['p23' => 'id', 'p14' => 'action', 'p5' => 'locale'],
							"\x00Nette\\Application\\Routers\\Route\x00metadata" => [
								'presenter' => ['value' => 'Multimedia', 'fixity' => 2],
								'action' => [
									'value' => 'default',
									'fixity' => 1,
									'pattern' => '#(?:[a-z][a-z0-9-]*)\z#A',
									'filterIn' => ['Nette\Application\Routers\Route', 'path2action'],
									'filterOut' => ['Nette\Application\Routers\Route', 'action2path'],
									'filterTable2' => null,
									'defOut' => 'default',
								],
								'id' => [
									'pattern' => '#(?:[^/]+)\z#A',
									'filterOut' => ['Nette\Application\Routers\Route', 'param2path'],
									'filterTable2' => null,
									'defOut' => null,
									'value' => null,
									'fixity' => 1,
								],
								'locale' => [
									'pattern' => '#(?:sk|en)\z#A',
									'filterOut' => ['Nette\Application\Routers\Route', 'param2path'],
									'value' => 'sk',
									'fixity' => 1,
									'filterTable2' => null,
									'defOut' => 'sk',
								],
							],
							"\x00Nette\\Application\\Routers\\Route\x00xlat" => [],
							"\x00Nette\\Application\\Routers\\Route\x00type" => 3,
							"\x00Nette\\Application\\Routers\\Route\x00scheme" => null,
							"\x00Nette\\Application\\Routers\\Route\x00flags" => 0,
							"\x00Nette\\Application\\Routers\\Route\x00lastRefUrl" => null,
							"\x00Nette\\Application\\Routers\\Route\x00lastBaseUrl" => null,
						]),
					],
				]),
				Nette\PhpGenerator\Helpers::createObject('Nette\Application\Routers\RouteList', [
					"\x00Nette\\Application\\Routers\\RouteList\x00cachedRoutes" => null,
					"\x00Nette\\Application\\Routers\\RouteList\x00module" => 'Admin:Profile:',
					"\x00Nette\\Utils\\ArrayList\x00list" => [
						Nette\PhpGenerator\Helpers::createObject('Nette\Application\Routers\Route', [
							"\x00Nette\\Application\\Routers\\Route\x00mask" => '[<locale=sk sk|en>/]admin/profile/<presenter>/<action>[/<id>]',
							"\x00Nette\\Application\\Routers\\Route\x00sequence" => [
								'',
								'[',
								'',
								'locale',
								'/',
								']',
								'admin/profile/',
								'presenter',
								'/',
								'action',
								'',
								'[',
								'/',
								'id',
								'',
								']',
								'',
							],
							"\x00Nette\\Application\\Routers\\Route\x00re" => '#(?:(?P<p5>(?U)sk|en)/)?admin/profile/(?:(?P<p14>(?U)[a-z][a-z0-9.-]*)/(?:(?P<p18>(?U)[a-z][a-z0-9-]*)(?:/(?P<p27>(?U)[^/]+))?)?)?/?\z#A',
							"\x00Nette\\Application\\Routers\\Route\x00aliases" => [
								'p27' => 'id',
								'p18' => 'action',
								'p14' => 'presenter',
								'p5' => 'locale',
							],
							"\x00Nette\\Application\\Routers\\Route\x00metadata" => [
								'presenter' => [
									'value' => 'Profile',
									'fixity' => 1,
									'pattern' => '#(?:[a-z][a-z0-9.-]*)\z#A',
									'filterIn' => ['Nette\Application\Routers\Route', 'path2presenter'],
									'filterOut' => ['Nette\Application\Routers\Route', 'presenter2path'],
									'filterTable2' => null,
									'defOut' => 'profile',
								],
								'action' => [
									'value' => 'default',
									'fixity' => 1,
									'pattern' => '#(?:[a-z][a-z0-9-]*)\z#A',
									'filterIn' => ['Nette\Application\Routers\Route', 'path2action'],
									'filterOut' => ['Nette\Application\Routers\Route', 'action2path'],
									'filterTable2' => null,
									'defOut' => 'default',
								],
								'id' => [
									'pattern' => '#(?:[^/]+)\z#A',
									'filterOut' => ['Nette\Application\Routers\Route', 'param2path'],
									'filterTable2' => null,
									'defOut' => null,
									'value' => null,
									'fixity' => 1,
								],
								'locale' => [
									'pattern' => '#(?:sk|en)\z#A',
									'filterOut' => ['Nette\Application\Routers\Route', 'param2path'],
									'value' => 'sk',
									'fixity' => 1,
									'filterTable2' => null,
									'defOut' => 'sk',
								],
							],
							"\x00Nette\\Application\\Routers\\Route\x00xlat" => [],
							"\x00Nette\\Application\\Routers\\Route\x00type" => 3,
							"\x00Nette\\Application\\Routers\\Route\x00scheme" => null,
							"\x00Nette\\Application\\Routers\\Route\x00flags" => 0,
							"\x00Nette\\Application\\Routers\\Route\x00lastRefUrl" => null,
							"\x00Nette\\Application\\Routers\\Route\x00lastBaseUrl" => null,
						]),
					],
				]),
				Nette\PhpGenerator\Helpers::createObject('Nette\Application\Routers\RouteList', [
					"\x00Nette\\Application\\Routers\\RouteList\x00cachedRoutes" => null,
					"\x00Nette\\Application\\Routers\\RouteList\x00module" => 'Admin:Profile:',
					"\x00Nette\\Utils\\ArrayList\x00list" => [
						Nette\PhpGenerator\Helpers::createObject('Nette\Application\Routers\Route', [
							"\x00Nette\\Application\\Routers\\Route\x00mask" => '[<locale=sk sk|en>/]admin/profile/<action>[/<id>]',
							"\x00Nette\\Application\\Routers\\Route\x00sequence" => [
								'',
								'[',
								'',
								'locale',
								'/',
								']',
								'admin/profile/',
								'action',
								'',
								'[',
								'/',
								'id',
								'',
								']',
								'',
							],
							"\x00Nette\\Application\\Routers\\Route\x00re" => '#(?:(?P<p5>(?U)sk|en)/)?admin/profile/(?:(?P<p14>(?U)[a-z][a-z0-9-]*)(?:/(?P<p23>(?U)[^/]+))?)?/?\z#A',
							"\x00Nette\\Application\\Routers\\Route\x00aliases" => ['p23' => 'id', 'p14' => 'action', 'p5' => 'locale'],
							"\x00Nette\\Application\\Routers\\Route\x00metadata" => [
								'presenter' => ['value' => 'Profile', 'fixity' => 2],
								'action' => [
									'value' => 'default',
									'fixity' => 1,
									'pattern' => '#(?:[a-z][a-z0-9-]*)\z#A',
									'filterIn' => ['Nette\Application\Routers\Route', 'path2action'],
									'filterOut' => ['Nette\Application\Routers\Route', 'action2path'],
									'filterTable2' => null,
									'defOut' => 'default',
								],
								'id' => [
									'pattern' => '#(?:[^/]+)\z#A',
									'filterOut' => ['Nette\Application\Routers\Route', 'param2path'],
									'filterTable2' => null,
									'defOut' => null,
									'value' => null,
									'fixity' => 1,
								],
								'locale' => [
									'pattern' => '#(?:sk|en)\z#A',
									'filterOut' => ['Nette\Application\Routers\Route', 'param2path'],
									'value' => 'sk',
									'fixity' => 1,
									'filterTable2' => null,
									'defOut' => 'sk',
								],
							],
							"\x00Nette\\Application\\Routers\\Route\x00xlat" => [],
							"\x00Nette\\Application\\Routers\\Route\x00type" => 3,
							"\x00Nette\\Application\\Routers\\Route\x00scheme" => null,
							"\x00Nette\\Application\\Routers\\Route\x00flags" => 0,
							"\x00Nette\\Application\\Routers\\Route\x00lastRefUrl" => null,
							"\x00Nette\\Application\\Routers\\Route\x00lastBaseUrl" => null,
						]),
					],
				]),
				Nette\PhpGenerator\Helpers::createObject('Nette\Application\Routers\RouteList', [
					"\x00Nette\\Application\\Routers\\RouteList\x00cachedRoutes" => null,
					"\x00Nette\\Application\\Routers\\RouteList\x00module" => 'Admin:Homepage:',
					"\x00Nette\\Utils\\ArrayList\x00list" => [
						Nette\PhpGenerator\Helpers::createObject('Nette\Application\Routers\Route', [
							"\x00Nette\\Application\\Routers\\Route\x00mask" => '[<locale=sk sk|en>/]admin/login',
							"\x00Nette\\Application\\Routers\\Route\x00sequence" => ['', '[', '', 'locale', '/', ']', 'admin/login'],
							"\x00Nette\\Application\\Routers\\Route\x00re" => '#(?:(?P<p5>(?U)sk|en)/)?admin/login/?\z#A',
							"\x00Nette\\Application\\Routers\\Route\x00aliases" => ['p5' => 'locale'],
							"\x00Nette\\Application\\Routers\\Route\x00metadata" => [
								'presenter' => ['value' => 'Homepage', 'fixity' => 2],
								'action' => ['value' => 'login', 'fixity' => 2],
								'locale' => [
									'pattern' => '#(?:sk|en)\z#A',
									'filterOut' => ['Nette\Application\Routers\Route', 'param2path'],
									'value' => 'sk',
									'fixity' => 1,
									'filterTable2' => null,
									'defOut' => 'sk',
								],
							],
							"\x00Nette\\Application\\Routers\\Route\x00xlat" => [],
							"\x00Nette\\Application\\Routers\\Route\x00type" => 3,
							"\x00Nette\\Application\\Routers\\Route\x00scheme" => null,
							"\x00Nette\\Application\\Routers\\Route\x00flags" => 0,
							"\x00Nette\\Application\\Routers\\Route\x00lastRefUrl" => null,
							"\x00Nette\\Application\\Routers\\Route\x00lastBaseUrl" => null,
						]),
					],
				]),
				Nette\PhpGenerator\Helpers::createObject('Nette\Application\Routers\RouteList', [
					"\x00Nette\\Application\\Routers\\RouteList\x00cachedRoutes" => null,
					"\x00Nette\\Application\\Routers\\RouteList\x00module" => 'Admin:Homepage:',
					"\x00Nette\\Utils\\ArrayList\x00list" => [
						Nette\PhpGenerator\Helpers::createObject('Nette\Application\Routers\Route', [
							"\x00Nette\\Application\\Routers\\Route\x00mask" => '[<locale=sk sk|en>/]admin/homepage/<presenter>/<action>[/<id>]',
							"\x00Nette\\Application\\Routers\\Route\x00sequence" => [
								'',
								'[',
								'',
								'locale',
								'/',
								']',
								'admin/homepage/',
								'presenter',
								'/',
								'action',
								'',
								'[',
								'/',
								'id',
								'',
								']',
								'',
							],
							"\x00Nette\\Application\\Routers\\Route\x00re" => '#(?:(?P<p5>(?U)sk|en)/)?admin/homepage/(?:(?P<p14>(?U)[a-z][a-z0-9.-]*)/(?:(?P<p18>(?U)[a-z][a-z0-9-]*)(?:/(?P<p27>(?U)[^/]+))?)?)?/?\z#A',
							"\x00Nette\\Application\\Routers\\Route\x00aliases" => [
								'p27' => 'id',
								'p18' => 'action',
								'p14' => 'presenter',
								'p5' => 'locale',
							],
							"\x00Nette\\Application\\Routers\\Route\x00metadata" => [
								'presenter' => [
									'value' => 'Homepage',
									'fixity' => 1,
									'pattern' => '#(?:[a-z][a-z0-9.-]*)\z#A',
									'filterIn' => ['Nette\Application\Routers\Route', 'path2presenter'],
									'filterOut' => ['Nette\Application\Routers\Route', 'presenter2path'],
									'filterTable2' => null,
									'defOut' => 'homepage',
								],
								'action' => [
									'value' => 'default',
									'fixity' => 1,
									'pattern' => '#(?:[a-z][a-z0-9-]*)\z#A',
									'filterIn' => ['Nette\Application\Routers\Route', 'path2action'],
									'filterOut' => ['Nette\Application\Routers\Route', 'action2path'],
									'filterTable2' => null,
									'defOut' => 'default',
								],
								'id' => [
									'pattern' => '#(?:[^/]+)\z#A',
									'filterOut' => ['Nette\Application\Routers\Route', 'param2path'],
									'filterTable2' => null,
									'defOut' => null,
									'value' => null,
									'fixity' => 1,
								],
								'locale' => [
									'pattern' => '#(?:sk|en)\z#A',
									'filterOut' => ['Nette\Application\Routers\Route', 'param2path'],
									'value' => 'sk',
									'fixity' => 1,
									'filterTable2' => null,
									'defOut' => 'sk',
								],
							],
							"\x00Nette\\Application\\Routers\\Route\x00xlat" => [],
							"\x00Nette\\Application\\Routers\\Route\x00type" => 3,
							"\x00Nette\\Application\\Routers\\Route\x00scheme" => null,
							"\x00Nette\\Application\\Routers\\Route\x00flags" => 0,
							"\x00Nette\\Application\\Routers\\Route\x00lastRefUrl" => null,
							"\x00Nette\\Application\\Routers\\Route\x00lastBaseUrl" => null,
						]),
					],
				]),
				Nette\PhpGenerator\Helpers::createObject('Nette\Application\Routers\RouteList', [
					"\x00Nette\\Application\\Routers\\RouteList\x00cachedRoutes" => null,
					"\x00Nette\\Application\\Routers\\RouteList\x00module" => 'Admin:Homepage:',
					"\x00Nette\\Utils\\ArrayList\x00list" => [
						Nette\PhpGenerator\Helpers::createObject('Nette\Application\Routers\Route', [
							"\x00Nette\\Application\\Routers\\Route\x00mask" => '[<locale=sk sk|en>/]admin/homepage/<action>[/<id>]',
							"\x00Nette\\Application\\Routers\\Route\x00sequence" => [
								'',
								'[',
								'',
								'locale',
								'/',
								']',
								'admin/homepage/',
								'action',
								'',
								'[',
								'/',
								'id',
								'',
								']',
								'',
							],
							"\x00Nette\\Application\\Routers\\Route\x00re" => '#(?:(?P<p5>(?U)sk|en)/)?admin/homepage/(?:(?P<p14>(?U)[a-z][a-z0-9-]*)(?:/(?P<p23>(?U)[^/]+))?)?/?\z#A',
							"\x00Nette\\Application\\Routers\\Route\x00aliases" => ['p23' => 'id', 'p14' => 'action', 'p5' => 'locale'],
							"\x00Nette\\Application\\Routers\\Route\x00metadata" => [
								'presenter' => ['value' => 'Homepage', 'fixity' => 2],
								'action' => [
									'value' => 'default',
									'fixity' => 1,
									'pattern' => '#(?:[a-z][a-z0-9-]*)\z#A',
									'filterIn' => ['Nette\Application\Routers\Route', 'path2action'],
									'filterOut' => ['Nette\Application\Routers\Route', 'action2path'],
									'filterTable2' => null,
									'defOut' => 'default',
								],
								'id' => [
									'pattern' => '#(?:[^/]+)\z#A',
									'filterOut' => ['Nette\Application\Routers\Route', 'param2path'],
									'filterTable2' => null,
									'defOut' => null,
									'value' => null,
									'fixity' => 1,
								],
								'locale' => [
									'pattern' => '#(?:sk|en)\z#A',
									'filterOut' => ['Nette\Application\Routers\Route', 'param2path'],
									'value' => 'sk',
									'fixity' => 1,
									'filterTable2' => null,
									'defOut' => 'sk',
								],
							],
							"\x00Nette\\Application\\Routers\\Route\x00xlat" => [],
							"\x00Nette\\Application\\Routers\\Route\x00type" => 3,
							"\x00Nette\\Application\\Routers\\Route\x00scheme" => null,
							"\x00Nette\\Application\\Routers\\Route\x00flags" => 0,
							"\x00Nette\\Application\\Routers\\Route\x00lastRefUrl" => null,
							"\x00Nette\\Application\\Routers\\Route\x00lastBaseUrl" => null,
						]),
					],
				]),
				Nette\PhpGenerator\Helpers::createObject('Nette\Application\Routers\RouteList', [
					"\x00Nette\\Application\\Routers\\RouteList\x00cachedRoutes" => null,
					"\x00Nette\\Application\\Routers\\RouteList\x00module" => 'Admin:Homepage:',
					"\x00Nette\\Utils\\ArrayList\x00list" => [
						Nette\PhpGenerator\Helpers::createObject('Nette\Application\Routers\Route', [
							"\x00Nette\\Application\\Routers\\Route\x00mask" => '[<locale=sk sk|en>/]admin/<action>[/<id>]',
							"\x00Nette\\Application\\Routers\\Route\x00sequence" => [
								'',
								'[',
								'',
								'locale',
								'/',
								']',
								'admin/',
								'action',
								'',
								'[',
								'/',
								'id',
								'',
								']',
								'',
							],
							"\x00Nette\\Application\\Routers\\Route\x00re" => '#(?:(?P<p5>(?U)sk|en)/)?admin/(?:(?P<p14>(?U)[a-z][a-z0-9-]*)(?:/(?P<p23>(?U)[^/]+))?)?/?\z#A',
							"\x00Nette\\Application\\Routers\\Route\x00aliases" => ['p23' => 'id', 'p14' => 'action', 'p5' => 'locale'],
							"\x00Nette\\Application\\Routers\\Route\x00metadata" => [
								'presenter' => ['value' => 'Homepage', 'fixity' => 2],
								'action' => [
									'value' => 'default',
									'fixity' => 1,
									'pattern' => '#(?:[a-z][a-z0-9-]*)\z#A',
									'filterIn' => ['Nette\Application\Routers\Route', 'path2action'],
									'filterOut' => ['Nette\Application\Routers\Route', 'action2path'],
									'filterTable2' => null,
									'defOut' => 'default',
								],
								'id' => [
									'pattern' => '#(?:[^/]+)\z#A',
									'filterOut' => ['Nette\Application\Routers\Route', 'param2path'],
									'filterTable2' => null,
									'defOut' => null,
									'value' => null,
									'fixity' => 1,
								],
								'locale' => [
									'pattern' => '#(?:sk|en)\z#A',
									'filterOut' => ['Nette\Application\Routers\Route', 'param2path'],
									'value' => 'sk',
									'fixity' => 1,
									'filterTable2' => null,
									'defOut' => 'sk',
								],
							],
							"\x00Nette\\Application\\Routers\\Route\x00xlat" => [],
							"\x00Nette\\Application\\Routers\\Route\x00type" => 3,
							"\x00Nette\\Application\\Routers\\Route\x00scheme" => null,
							"\x00Nette\\Application\\Routers\\Route\x00flags" => 0,
							"\x00Nette\\Application\\Routers\\Route\x00lastRefUrl" => null,
							"\x00Nette\\Application\\Routers\\Route\x00lastBaseUrl" => null,
						]),
					],
				]),
				Nette\PhpGenerator\Helpers::createObject('Nette\Application\Routers\RouteList', [
					"\x00Nette\\Application\\Routers\\RouteList\x00cachedRoutes" => null,
					"\x00Nette\\Application\\Routers\\RouteList\x00module" => 'Admin:Authorizator:',
					"\x00Nette\\Utils\\ArrayList\x00list" => [
						Nette\PhpGenerator\Helpers::createObject('Nette\Application\Routers\Route', [
							"\x00Nette\\Application\\Routers\\Route\x00mask" => '[<locale=sk sk|en>/]admin/authorizator/<presenter>/<action>[/<id>]',
							"\x00Nette\\Application\\Routers\\Route\x00sequence" => [
								'',
								'[',
								'',
								'locale',
								'/',
								']',
								'admin/authorizator/',
								'presenter',
								'/',
								'action',
								'',
								'[',
								'/',
								'id',
								'',
								']',
								'',
							],
							"\x00Nette\\Application\\Routers\\Route\x00re" => '#(?:(?P<p5>(?U)sk|en)/)?admin/authorizator/(?:(?P<p14>(?U)[a-z][a-z0-9.-]*)/(?:(?P<p18>(?U)[a-z][a-z0-9-]*)(?:/(?P<p27>(?U)[^/]+))?)?)?/?\z#A',
							"\x00Nette\\Application\\Routers\\Route\x00aliases" => [
								'p27' => 'id',
								'p18' => 'action',
								'p14' => 'presenter',
								'p5' => 'locale',
							],
							"\x00Nette\\Application\\Routers\\Route\x00metadata" => [
								'presenter' => [
									'value' => 'Authorizator',
									'fixity' => 1,
									'pattern' => '#(?:[a-z][a-z0-9.-]*)\z#A',
									'filterIn' => ['Nette\Application\Routers\Route', 'path2presenter'],
									'filterOut' => ['Nette\Application\Routers\Route', 'presenter2path'],
									'filterTable2' => null,
									'defOut' => 'authorizator',
								],
								'action' => [
									'value' => 'default',
									'fixity' => 1,
									'pattern' => '#(?:[a-z][a-z0-9-]*)\z#A',
									'filterIn' => ['Nette\Application\Routers\Route', 'path2action'],
									'filterOut' => ['Nette\Application\Routers\Route', 'action2path'],
									'filterTable2' => null,
									'defOut' => 'default',
								],
								'id' => [
									'pattern' => '#(?:[^/]+)\z#A',
									'filterOut' => ['Nette\Application\Routers\Route', 'param2path'],
									'filterTable2' => null,
									'defOut' => null,
									'value' => null,
									'fixity' => 1,
								],
								'locale' => [
									'pattern' => '#(?:sk|en)\z#A',
									'filterOut' => ['Nette\Application\Routers\Route', 'param2path'],
									'value' => 'sk',
									'fixity' => 1,
									'filterTable2' => null,
									'defOut' => 'sk',
								],
							],
							"\x00Nette\\Application\\Routers\\Route\x00xlat" => [],
							"\x00Nette\\Application\\Routers\\Route\x00type" => 3,
							"\x00Nette\\Application\\Routers\\Route\x00scheme" => null,
							"\x00Nette\\Application\\Routers\\Route\x00flags" => 0,
							"\x00Nette\\Application\\Routers\\Route\x00lastRefUrl" => null,
							"\x00Nette\\Application\\Routers\\Route\x00lastBaseUrl" => null,
						]),
					],
				]),
				Nette\PhpGenerator\Helpers::createObject('Nette\Application\Routers\RouteList', [
					"\x00Nette\\Application\\Routers\\RouteList\x00cachedRoutes" => null,
					"\x00Nette\\Application\\Routers\\RouteList\x00module" => 'Admin:Authorizator:',
					"\x00Nette\\Utils\\ArrayList\x00list" => [
						Nette\PhpGenerator\Helpers::createObject('Nette\Application\Routers\Route', [
							"\x00Nette\\Application\\Routers\\Route\x00mask" => '[<locale=sk sk|en>/]admin/authorizator/<action>[/<id>]',
							"\x00Nette\\Application\\Routers\\Route\x00sequence" => [
								'',
								'[',
								'',
								'locale',
								'/',
								']',
								'admin/authorizator/',
								'action',
								'',
								'[',
								'/',
								'id',
								'',
								']',
								'',
							],
							"\x00Nette\\Application\\Routers\\Route\x00re" => '#(?:(?P<p5>(?U)sk|en)/)?admin/authorizator/(?:(?P<p14>(?U)[a-z][a-z0-9-]*)(?:/(?P<p23>(?U)[^/]+))?)?/?\z#A',
							"\x00Nette\\Application\\Routers\\Route\x00aliases" => ['p23' => 'id', 'p14' => 'action', 'p5' => 'locale'],
							"\x00Nette\\Application\\Routers\\Route\x00metadata" => [
								'presenter' => ['value' => 'Authorizator', 'fixity' => 2],
								'action' => [
									'value' => 'default',
									'fixity' => 1,
									'pattern' => '#(?:[a-z][a-z0-9-]*)\z#A',
									'filterIn' => ['Nette\Application\Routers\Route', 'path2action'],
									'filterOut' => ['Nette\Application\Routers\Route', 'action2path'],
									'filterTable2' => null,
									'defOut' => 'default',
								],
								'id' => [
									'pattern' => '#(?:[^/]+)\z#A',
									'filterOut' => ['Nette\Application\Routers\Route', 'param2path'],
									'filterTable2' => null,
									'defOut' => null,
									'value' => null,
									'fixity' => 1,
								],
								'locale' => [
									'pattern' => '#(?:sk|en)\z#A',
									'filterOut' => ['Nette\Application\Routers\Route', 'param2path'],
									'value' => 'sk',
									'fixity' => 1,
									'filterTable2' => null,
									'defOut' => 'sk',
								],
							],
							"\x00Nette\\Application\\Routers\\Route\x00xlat" => [],
							"\x00Nette\\Application\\Routers\\Route\x00type" => 3,
							"\x00Nette\\Application\\Routers\\Route\x00scheme" => null,
							"\x00Nette\\Application\\Routers\\Route\x00flags" => 0,
							"\x00Nette\\Application\\Routers\\Route\x00lastRefUrl" => null,
							"\x00Nette\\Application\\Routers\\Route\x00lastBaseUrl" => null,
						]),
					],
				]),
				Nette\PhpGenerator\Helpers::createObject('Nette\Application\Routers\RouteList', [
					"\x00Nette\\Application\\Routers\\RouteList\x00cachedRoutes" => null,
					"\x00Nette\\Application\\Routers\\RouteList\x00module" => 'Front:Domov:',
					"\x00Nette\\Utils\\ArrayList\x00list" => [
						Nette\PhpGenerator\Helpers::createObject('Nette\Application\Routers\Route', [
							"\x00Nette\\Application\\Routers\\Route\x00mask" => '[<locale=sk sk|en|de>/]<presenter>/<action>[/<id>]',
							"\x00Nette\\Application\\Routers\\Route\x00sequence" => [
								'',
								'[',
								'',
								'locale',
								'/',
								']',
								'',
								'presenter',
								'/',
								'action',
								'',
								'[',
								'/',
								'id',
								'',
								']',
								'',
							],
							"\x00Nette\\Application\\Routers\\Route\x00re" => '#(?:(?P<p5>(?U)sk|en|de)/)?(?:(?P<p14>(?U)[a-z][a-z0-9.-]*)/(?:(?P<p18>(?U)[a-z][a-z0-9-]*)(?:/(?P<p27>(?U)[^/]+))?)?)?/?\z#A',
							"\x00Nette\\Application\\Routers\\Route\x00aliases" => [
								'p27' => 'id',
								'p18' => 'action',
								'p14' => 'presenter',
								'p5' => 'locale',
							],
							"\x00Nette\\Application\\Routers\\Route\x00metadata" => [
								'presenter' => [
									'value' => 'Domov',
									'fixity' => 1,
									'pattern' => '#(?:[a-z][a-z0-9.-]*)\z#A',
									'filterIn' => ['Nette\Application\Routers\Route', 'path2presenter'],
									'filterOut' => ['Nette\Application\Routers\Route', 'presenter2path'],
									'filterTable2' => null,
									'defOut' => 'domov',
								],
								'action' => [
									'value' => 'default',
									'fixity' => 1,
									'pattern' => '#(?:[a-z][a-z0-9-]*)\z#A',
									'filterIn' => ['Nette\Application\Routers\Route', 'path2action'],
									'filterOut' => ['Nette\Application\Routers\Route', 'action2path'],
									'filterTable2' => null,
									'defOut' => 'default',
								],
								'id' => [
									'pattern' => '#(?:[^/]+)\z#A',
									'filterOut' => ['Nette\Application\Routers\Route', 'param2path'],
									'filterTable2' => null,
									'defOut' => null,
									'value' => null,
									'fixity' => 1,
								],
								'locale' => [
									'pattern' => '#(?:sk|en|de)\z#A',
									'filterOut' => ['Nette\Application\Routers\Route', 'param2path'],
									'value' => 'sk',
									'fixity' => 1,
									'filterTable2' => null,
									'defOut' => 'sk',
								],
							],
							"\x00Nette\\Application\\Routers\\Route\x00xlat" => [],
							"\x00Nette\\Application\\Routers\\Route\x00type" => 3,
							"\x00Nette\\Application\\Routers\\Route\x00scheme" => null,
							"\x00Nette\\Application\\Routers\\Route\x00flags" => 0,
							"\x00Nette\\Application\\Routers\\Route\x00lastRefUrl" => null,
							"\x00Nette\\Application\\Routers\\Route\x00lastBaseUrl" => null,
						]),
					],
				]),
			],
			'doctrine.debug' => false,
			'doctrine' => [
				'orm' => ['defaultEntityManager' => 'default'],
				'dbal' => ['defaultConnection' => 'default'],
			],
		];
	}


	public function createServiceAnnotations__cache__annotations(): Doctrine\Common\Cache\Cache
	{
		$service = new Kdyby\DoctrineCache\Cache($this->getService('cache.storage'), 'Doctrine.Annotations',
			true);
		$service->setNamespace('Kdyby_annotations.cache.annotations_a34dad6d');
		return $service;
	}


	public function createServiceAnnotations__reader(): Doctrine\Common\Annotations\Reader
	{
		$service = new Doctrine\Common\Annotations\CachedReader($this->getService('annotations.reflectionReader'),
			$this->getService('annotations.cache.annotations'), true);
		return $service;
	}


	public function createServiceAnnotations__reflectionReader(): Doctrine\Common\Annotations\AnnotationReader
	{
		$service = new Doctrine\Common\Annotations\AnnotationReader;
		$service->addGlobalIgnoredName('persistent');
		$service->addGlobalIgnoredName('serializationVersion');
		return $service;
	}


	public function createServiceApplication__1(): HelpModule\Presenters\HelpPresenter
	{
		$service = new HelpModule\Presenters\HelpPresenter;
		$service->injectPrimary($this, $this->getService('application.presenterFactory'),
			$this->getService('routing.router'), $this->getService('http.request'),
			$this->getService('http.response'), $this->getService('session.session'),
			$this->getService('security.user'), $this->getService('latte.templateFactory'));
		$service->userService = $this->getService('user.userService');
		$service->user = $this->getService('security.user');
		$service->translator = $this->getService('translation.default');
		$service->settingsService = $this->getService('settings.settingsService');
		$service->menuitemService = $this->getService('backend.default.MenuitemService');
		$service->logService = $this->getService('log.logService');
		$service->iStorage = $this->getService('cache.storage');
		$service->dirService = $this->getService('backend.default.DirService');
		$service->database = $this->getService('database.default.context');
		$service->clientService = $this->getService('client.clientService');
		$service->appSetupService = $this->getService('backend.default.AppSetupService');
		$service->invalidLinkMode = 5;
		$service->onShutdown = $this->getService('events.manager')->createEvent(['HelpModule\Presenters\HelpPresenter', 'onShutdown'],
			$service->onShutdown, null, false);
		$service->onAnchor = $this->getService('events.manager')->createEvent(['HelpModule\Presenters\HelpPresenter', 'onAnchor'],
			$service->onAnchor, null, false);
		return $service;
	}


	public function createServiceApplication__10(): ProjectModule\Presenters\ProjectPresenter
	{
		$service = new ProjectModule\Presenters\ProjectPresenter;
		$service->injectPrimary($this, $this->getService('application.presenterFactory'),
			$this->getService('routing.router'), $this->getService('http.request'),
			$this->getService('http.response'), $this->getService('session.session'),
			$this->getService('security.user'), $this->getService('latte.templateFactory'));
		$service->userService = $this->getService('user.userService');
		$service->user = $this->getService('security.user');
		$service->translator = $this->getService('translation.default');
		$service->projectService = $this->getService('project.projectService');
		$service->projectFormFactory = $this->getService('project.projectFormFactory');
		$service->menuitemService = $this->getService('backend.default.MenuitemService');
		$service->logService = $this->getService('log.logService');
		$service->iStorage = $this->getService('cache.storage');
		$service->dirService = $this->getService('backend.default.DirService');
		$service->datagridFactory = $this->getService('backend.default.DatagridFactory');
		$service->database = $this->getService('database.default.context');
		$service->clientService = $this->getService('client.clientService');
		$service->appSetupService = $this->getService('backend.default.AppSetupService');
		$service->invalidLinkMode = 5;
		$service->onShutdown = $this->getService('events.manager')->createEvent(['ProjectModule\Presenters\ProjectPresenter', 'onShutdown'],
			$service->onShutdown, null, false);
		$service->onAnchor = $this->getService('events.manager')->createEvent(['ProjectModule\Presenters\ProjectPresenter', 'onAnchor'],
			$service->onAnchor, null, false);
		return $service;
	}


	public function createServiceApplication__11(): ProjectModule\Presenters\RestIssuesPresenter
	{
		$service = new ProjectModule\Presenters\RestIssuesPresenter;
		$service->injectPrimary($this, $this->getService('application.presenterFactory'),
			$this->getService('routing.router'), $this->getService('http.request'),
			$this->getService('http.response'), $this->getService('session.session'),
			$this->getService('security.user'), $this->getService('latte.templateFactory'));
		$service->database = $this->getService('database.default.context');
		$service->invalidLinkMode = 5;
		$service->onShutdown = $this->getService('events.manager')->createEvent(['ProjectModule\Presenters\RestIssuesPresenter', 'onShutdown'],
			$service->onShutdown, null, false);
		$service->onAnchor = $this->getService('events.manager')->createEvent(['ProjectModule\Presenters\RestIssuesPresenter', 'onAnchor'],
			$service->onAnchor, null, false);
		return $service;
	}


	public function createServiceApplication__12(): ProjectModule\Presenters\RestSettingsPresenter
	{
		$service = new ProjectModule\Presenters\RestSettingsPresenter;
		$service->injectPrimary($this, $this->getService('application.presenterFactory'),
			$this->getService('routing.router'), $this->getService('http.request'),
			$this->getService('http.response'), $this->getService('session.session'),
			$this->getService('security.user'), $this->getService('latte.templateFactory'));
		$service->database = $this->getService('database.default.context');
		$service->invalidLinkMode = 5;
		$service->onShutdown = $this->getService('events.manager')->createEvent(['ProjectModule\Presenters\RestSettingsPresenter', 'onShutdown'],
			$service->onShutdown, null, false);
		$service->onAnchor = $this->getService('events.manager')->createEvent(['ProjectModule\Presenters\RestSettingsPresenter', 'onAnchor'],
			$service->onAnchor, null, false);
		return $service;
	}


	public function createServiceApplication__13(): ProjectModule\Presenters\RestTestExecutionPresenter
	{
		$service = new ProjectModule\Presenters\RestTestExecutionPresenter;
		$service->injectPrimary($this, $this->getService('application.presenterFactory'),
			$this->getService('routing.router'), $this->getService('http.request'),
			$this->getService('http.response'), $this->getService('session.session'),
			$this->getService('security.user'), $this->getService('latte.templateFactory'));
		$service->database = $this->getService('database.default.context');
		$service->invalidLinkMode = 5;
		$service->onShutdown = $this->getService('events.manager')->createEvent(['ProjectModule\Presenters\RestTestExecutionPresenter', 'onShutdown'],
			$service->onShutdown, null, false);
		$service->onAnchor = $this->getService('events.manager')->createEvent(['ProjectModule\Presenters\RestTestExecutionPresenter', 'onAnchor'],
			$service->onAnchor, null, false);
		return $service;
	}


	public function createServiceApplication__14(): ProjectModule\Presenters\SettingsPresenter
	{
		$service = new ProjectModule\Presenters\SettingsPresenter;
		$service->injectPrimary($this, $this->getService('application.presenterFactory'),
			$this->getService('routing.router'), $this->getService('http.request'),
			$this->getService('http.response'), $this->getService('session.session'),
			$this->getService('security.user'), $this->getService('latte.templateFactory'));
		$service->userService = $this->getService('user.userService');
		$service->user = $this->getService('security.user');
		$service->translator = $this->getService('translation.default');
		$service->simpleEntityService = $this->getService('backend.default.SimpleEntityService');
		$service->projectService = $this->getService('project.projectService');
		$service->projectFormFactory = $this->getService('project.projectFormFactory');
		$service->menuitemService = $this->getService('backend.default.MenuitemService');
		$service->logService = $this->getService('log.logService');
		$service->iStorage = $this->getService('cache.storage');
		$service->dirService = $this->getService('backend.default.DirService');
		$service->datagridFactory = $this->getService('backend.default.DatagridFactory');
		$service->database = $this->getService('database.default.context');
		$service->clientService = $this->getService('client.clientService');
		$service->appSetupService = $this->getService('backend.default.AppSetupService');
		$service->invalidLinkMode = 5;
		$service->onShutdown = $this->getService('events.manager')->createEvent(['ProjectModule\Presenters\SettingsPresenter', 'onShutdown'],
			$service->onShutdown, null, false);
		$service->onAnchor = $this->getService('events.manager')->createEvent(['ProjectModule\Presenters\SettingsPresenter', 'onAnchor'],
			$service->onAnchor, null, false);
		return $service;
	}


	public function createServiceApplication__15(): ProjectModule\Presenters\TestAnalysesPresenter
	{
		$service = new ProjectModule\Presenters\TestAnalysesPresenter;
		$service->injectPrimary($this, $this->getService('application.presenterFactory'),
			$this->getService('routing.router'), $this->getService('http.request'),
			$this->getService('http.response'), $this->getService('session.session'),
			$this->getService('security.user'), $this->getService('latte.templateFactory'));
		$service->userService = $this->getService('user.userService');
		$service->user = $this->getService('security.user');
		$service->translator = $this->getService('translation.default');
		$service->testSetService = $this->getService('project.TestSetService');
		$service->testSetFormFactory = $this->getService('project.testSetFormFactory');
		$service->testCaseService = $this->getService('project.TestCaseService');
		$service->testCaseFormFactory = $this->getService('project.testCaseFormFactory');
		$service->projectService = $this->getService('project.projectService');
		$service->projectFormFactory = $this->getService('project.projectFormFactory');
		$service->menuitemService = $this->getService('backend.default.MenuitemService');
		$service->logService = $this->getService('log.logService');
		$service->importTestAnalysesFormFactory = $this->getService('project.ImportTestAnalysesFormFactory');
		$service->iStorage = $this->getService('cache.storage');
		$service->dirService = $this->getService('backend.default.DirService');
		$service->datagridFactory = $this->getService('backend.default.DatagridFactory');
		$service->database = $this->getService('database.default.context');
		$service->clientService = $this->getService('client.clientService');
		$service->appSetupService = $this->getService('backend.default.AppSetupService');
		$service->invalidLinkMode = 5;
		$service->onShutdown = $this->getService('events.manager')->createEvent(['ProjectModule\Presenters\TestAnalysesPresenter', 'onShutdown'],
			$service->onShutdown, null, false);
		$service->onAnchor = $this->getService('events.manager')->createEvent(['ProjectModule\Presenters\TestAnalysesPresenter', 'onAnchor'],
			$service->onAnchor, null, false);
		return $service;
	}


	public function createServiceApplication__16(): ProjectModule\Presenters\TestExecutionPresenter
	{
		$service = new ProjectModule\Presenters\TestExecutionPresenter;
		$service->injectPrimary($this, $this->getService('application.presenterFactory'),
			$this->getService('routing.router'), $this->getService('http.request'),
			$this->getService('http.response'), $this->getService('session.session'),
			$this->getService('security.user'), $this->getService('latte.templateFactory'));
		$service->userService = $this->getService('user.userService');
		$service->user = $this->getService('security.user');
		$service->translator = $this->getService('translation.default');
		$service->testPlanSprintService = $this->getService('project.TestPlanSprintService');
		$service->testPlanSprintCaseService = $this->getService('project.TestPlanSprintCaseService');
		$service->projectService = $this->getService('project.projectService');
		$service->projectFormFactory = $this->getService('project.projectFormFactory');
		$service->menuitemService = $this->getService('backend.default.MenuitemService');
		$service->logService = $this->getService('log.logService');
		$service->issueFormFactory = $this->getService('project.IssueFormFactory');
		$service->iStorage = $this->getService('cache.storage');
		$service->dirService = $this->getService('backend.default.DirService');
		$service->datagridFactory = $this->getService('backend.default.DatagridFactory');
		$service->database = $this->getService('database.default.context');
		$service->clientService = $this->getService('client.clientService');
		$service->appSetupService = $this->getService('backend.default.AppSetupService');
		$service->invalidLinkMode = 5;
		$service->onShutdown = $this->getService('events.manager')->createEvent(['ProjectModule\Presenters\TestExecutionPresenter', 'onShutdown'],
			$service->onShutdown, null, false);
		$service->onAnchor = $this->getService('events.manager')->createEvent(['ProjectModule\Presenters\TestExecutionPresenter', 'onAnchor'],
			$service->onAnchor, null, false);
		return $service;
	}


	public function createServiceApplication__17(): ProjectModule\Presenters\TestPlanPresenter
	{
		$service = new ProjectModule\Presenters\TestPlanPresenter;
		$service->injectPrimary($this, $this->getService('application.presenterFactory'),
			$this->getService('routing.router'), $this->getService('http.request'),
			$this->getService('http.response'), $this->getService('session.session'),
			$this->getService('security.user'), $this->getService('latte.templateFactory'));
		$service->userService = $this->getService('user.userService');
		$service->user = $this->getService('security.user');
		$service->translator = $this->getService('translation.default');
		$service->testPlanSprintService = $this->getService('project.TestPlanSprintService');
		$service->testPlanSprintRoleFormFactory = $this->getService('project.TestPlanSprintRoleFormFactory');
		$service->testPlanSprintFormFactory = $this->getService('project.TestPlanSprintFormFactory');
		$service->testPlanService = $this->getService('project.TestPlanService');
		$service->testPlanFormFactory = $this->getService('project.TestPlanFormFactory');
		$service->tagDatesFormFactory = $this->getService('project.TagDatesFormFactory');
		$service->simpleEntityService = $this->getService('backend.default.SimpleEntityService');
		$service->projectService = $this->getService('project.projectService');
		$service->projectRoleService = $this->getService('project.ProjectRoleService');
		$service->projectFormFactory = $this->getService('project.projectFormFactory');
		$service->menuitemService = $this->getService('backend.default.MenuitemService');
		$service->logService = $this->getService('log.logService');
		$service->iStorage = $this->getService('cache.storage');
		$service->dirService = $this->getService('backend.default.DirService');
		$service->datagridFactory = $this->getService('backend.default.DatagridFactory');
		$service->database = $this->getService('database.default.context');
		$service->clientService = $this->getService('client.clientService');
		$service->appSetupService = $this->getService('backend.default.AppSetupService');
		$service->invalidLinkMode = 5;
		$service->onShutdown = $this->getService('events.manager')->createEvent(['ProjectModule\Presenters\TestPlanPresenter', 'onShutdown'],
			$service->onShutdown, null, false);
		$service->onAnchor = $this->getService('events.manager')->createEvent(['ProjectModule\Presenters\TestPlanPresenter', 'onAnchor'],
			$service->onAnchor, null, false);
		return $service;
	}


	public function createServiceApplication__18(): SettingsModule\Presenters\SimpleSettingsPresenter
	{
		$service = new SettingsModule\Presenters\SimpleSettingsPresenter;
		$service->injectPrimary($this, $this->getService('application.presenterFactory'),
			$this->getService('routing.router'), $this->getService('http.request'),
			$this->getService('http.response'), $this->getService('session.session'),
			$this->getService('security.user'), $this->getService('latte.templateFactory'));
		$service->userService = $this->getService('user.userService');
		$service->user = $this->getService('security.user');
		$service->translator = $this->getService('translation.default');
		$service->menuitemService = $this->getService('backend.default.MenuitemService');
		$service->logService = $this->getService('log.logService');
		$service->iStorage = $this->getService('cache.storage');
		$service->generalSettingsFormFactory = $this->getService('settings.generalSettingsFormFactory');
		$service->dirService = $this->getService('backend.default.DirService');
		$service->database = $this->getService('database.default.context');
		$service->clientService = $this->getService('client.clientService');
		$service->appSetupService = $this->getService('backend.default.AppSetupService');
		$service->invalidLinkMode = 5;
		$service->onShutdown = $this->getService('events.manager')->createEvent(['SettingsModule\Presenters\SimpleSettingsPresenter', 'onShutdown'],
			$service->onShutdown, null, false);
		$service->onAnchor = $this->getService('events.manager')->createEvent(['SettingsModule\Presenters\SimpleSettingsPresenter', 'onAnchor'],
			$service->onAnchor, null, false);
		return $service;
	}


	public function createServiceApplication__19(): SettingsModule\Presenters\SpecificSettingsPresenter
	{
		$service = new SettingsModule\Presenters\SpecificSettingsPresenter;
		$service->injectPrimary($this, $this->getService('application.presenterFactory'),
			$this->getService('routing.router'), $this->getService('http.request'),
			$this->getService('http.response'), $this->getService('session.session'),
			$this->getService('security.user'), $this->getService('latte.templateFactory'));
		$service->userService = $this->getService('user.userService');
		$service->user = $this->getService('security.user');
		$service->translator = $this->getService('translation.default');
		$service->settingsManager = $this->getService('settings.SettingsManager');
		$service->menuitemService = $this->getService('backend.default.MenuitemService');
		$service->logService = $this->getService('log.logService');
		$service->iStorage = $this->getService('cache.storage');
		$service->dirService = $this->getService('backend.default.DirService');
		$service->database = $this->getService('database.default.context');
		$service->clientService = $this->getService('client.clientService');
		$service->appSetupService = $this->getService('backend.default.AppSetupService');
		$service->invalidLinkMode = 5;
		$service->onShutdown = $this->getService('events.manager')->createEvent(['SettingsModule\Presenters\SpecificSettingsPresenter', 'onShutdown'],
			$service->onShutdown, null, false);
		$service->onAnchor = $this->getService('events.manager')->createEvent(['SettingsModule\Presenters\SpecificSettingsPresenter', 'onAnchor'],
			$service->onAnchor, null, false);
		return $service;
	}


	public function createServiceApplication__2(): HomepageModule\Presenters\HomepagePresenter
	{
		$service = new HomepageModule\Presenters\HomepagePresenter;
		$service->injectPrimary($this, $this->getService('application.presenterFactory'),
			$this->getService('routing.router'), $this->getService('http.request'),
			$this->getService('http.response'), $this->getService('session.session'),
			$this->getService('security.user'), $this->getService('latte.templateFactory'));
		$service->userService = $this->getService('user.userService');
		$service->user = $this->getService('security.user');
		$service->translator = $this->getService('translation.default');
		$service->menuitemService = $this->getService('backend.default.MenuitemService');
		$service->lostPasswordFormFactory = $this->getService('user.LostPasswordFormFactory');
		$service->loginPictureService = $this->getService('homepage.loginPictureService');
		$service->loginFormFactory = $this->getService('authentication.loginFormFactory');
		$service->logService = $this->getService('log.logService');
		$service->iStorage = $this->getService('cache.storage');
		$service->dirService = $this->getService('backend.default.DirService');
		$service->database = $this->getService('database.default.context');
		$service->clientService = $this->getService('client.clientService');
		$service->appSetupService = $this->getService('backend.default.AppSetupService');
		$service->invalidLinkMode = 5;
		$service->onShutdown = $this->getService('events.manager')->createEvent(['HomepageModule\Presenters\HomepagePresenter', 'onShutdown'],
			$service->onShutdown, null, false);
		$service->onAnchor = $this->getService('events.manager')->createEvent(['HomepageModule\Presenters\HomepagePresenter', 'onAnchor'],
			$service->onAnchor, null, false);
		return $service;
	}


	public function createServiceApplication__20(): UserModule\Presenters\UserPresenter
	{
		$service = new UserModule\Presenters\UserPresenter;
		$service->injectPrimary($this, $this->getService('application.presenterFactory'),
			$this->getService('routing.router'), $this->getService('http.request'),
			$this->getService('http.response'), $this->getService('session.session'),
			$this->getService('security.user'), $this->getService('latte.templateFactory'));
		$service->userService = $this->getService('user.userService');
		$service->userFormFactory = $this->getService('user.userFormFactory');
		$service->user = $this->getService('security.user');
		$service->translator = $this->getService('translation.default');
		$service->menuitemService = $this->getService('backend.default.MenuitemService');
		$service->logService = $this->getService('log.logService');
		$service->iStorage = $this->getService('cache.storage');
		$service->dirService = $this->getService('backend.default.DirService');
		$service->datagridFactory = $this->getService('backend.default.DatagridFactory');
		$service->database = $this->getService('database.default.context');
		$service->clientService = $this->getService('client.clientService');
		$service->appSetupService = $this->getService('backend.default.AppSetupService');
		$service->invalidLinkMode = 5;
		$service->onShutdown = $this->getService('events.manager')->createEvent(['UserModule\Presenters\UserPresenter', 'onShutdown'],
			$service->onShutdown, null, false);
		$service->onAnchor = $this->getService('events.manager')->createEvent(['UserModule\Presenters\UserPresenter', 'onAnchor'],
			$service->onAnchor, null, false);
		return $service;
	}


	public function createServiceApplication__21(): Ublaboo\DataGrid\Tests\Files\ExportTestingPresenter
	{
		$service = new Ublaboo\DataGrid\Tests\Files\ExportTestingPresenter;
		$service->injectPrimary($this, $this->getService('application.presenterFactory'),
			$this->getService('routing.router'), $this->getService('http.request'),
			$this->getService('http.response'), $this->getService('session.session'),
			$this->getService('security.user'), $this->getService('latte.templateFactory'));
		$service->invalidLinkMode = 5;
		$service->onShutdown = $this->getService('events.manager')->createEvent(['Ublaboo\DataGrid\Tests\Files\ExportTestingPresenter', 'onShutdown'],
			$service->onShutdown, null, false);
		$service->onAnchor = $this->getService('events.manager')->createEvent(['Ublaboo\DataGrid\Tests\Files\ExportTestingPresenter', 'onAnchor'],
			$service->onAnchor, null, false);
		return $service;
	}


	public function createServiceApplication__22(): Ublaboo\DataGrid\Tests\Files\XTestingPresenter
	{
		$service = new Ublaboo\DataGrid\Tests\Files\XTestingPresenter;
		$service->injectPrimary($this, $this->getService('application.presenterFactory'),
			$this->getService('routing.router'), $this->getService('http.request'),
			$this->getService('http.response'), $this->getService('session.session'),
			$this->getService('security.user'), $this->getService('latte.templateFactory'));
		$service->invalidLinkMode = 5;
		$service->onShutdown = $this->getService('events.manager')->createEvent(['Ublaboo\DataGrid\Tests\Files\XTestingPresenter', 'onShutdown'],
			$service->onShutdown, null, false);
		$service->onAnchor = $this->getService('events.manager')->createEvent(['Ublaboo\DataGrid\Tests\Files\XTestingPresenter', 'onAnchor'],
			$service->onAnchor, null, false);
		return $service;
	}


	public function createServiceApplication__23(): App\Presenters\ErrorPresenter
	{
		$service = new App\Presenters\ErrorPresenter($this->getService('tracy.logger'), $this->getService('backend.default.MyMailer'));
		$service->injectPrimary($this, $this->getService('application.presenterFactory'),
			$this->getService('routing.router'), $this->getService('http.request'),
			$this->getService('http.response'), $this->getService('session.session'),
			$this->getService('security.user'), $this->getService('latte.templateFactory'));
		$service->user = $this->getService('security.user');
		$service->translator = $this->getService('translation.default');
		$service->invalidLinkMode = 5;
		$service->onShutdown = $this->getService('events.manager')->createEvent(['App\Presenters\ErrorPresenter', 'onShutdown'],
			$service->onShutdown, null, false);
		$service->onAnchor = $this->getService('events.manager')->createEvent(['App\Presenters\ErrorPresenter', 'onAnchor'],
			$service->onAnchor, null, false);
		return $service;
	}


	public function createServiceApplication__24(): Front\DomovModule\Presenters\DomovPresenter
	{
		$service = new Front\DomovModule\Presenters\DomovPresenter;
		$service->injectPrimary($this, $this->getService('application.presenterFactory'),
			$this->getService('routing.router'), $this->getService('http.request'),
			$this->getService('http.response'), $this->getService('session.session'),
			$this->getService('security.user'), $this->getService('latte.templateFactory'));
		$service->user = $this->getService('security.user');
		$service->translator = $this->getService('translation.default');
		$service->request = $this->getService('http.request');
		$service->iStorage = $this->getService('cache.storage');
		$service->dirService = $this->getService('backend.default.DirService');
		$service->clientService = $this->getService('client.clientService');
		$service->invalidLinkMode = 5;
		$service->onShutdown = $this->getService('events.manager')->createEvent(['Front\DomovModule\Presenters\DomovPresenter', 'onShutdown'],
			$service->onShutdown, null, false);
		$service->onAnchor = $this->getService('events.manager')->createEvent(['Front\DomovModule\Presenters\DomovPresenter', 'onAnchor'],
			$service->onAnchor, null, false);
		return $service;
	}


	public function createServiceApplication__25(): KdybyModule\CliPresenter
	{
		$service = new KdybyModule\CliPresenter;
		$service->injectPrimary($this, $this->getService('application.presenterFactory'),
			$this->getService('routing.router'), $this->getService('http.request'),
			$this->getService('http.response'), $this->getService('session.session'),
			$this->getService('security.user'), $this->getService('latte.templateFactory'));
		$service->injectConsole($this->getService('console.application'), $this->getService('application.application'));
		$service->invalidLinkMode = 5;
		$service->onShutdown = $this->getService('events.manager')->createEvent(['KdybyModule\CliPresenter', 'onShutdown'],
			$service->onShutdown, null, false);
		$service->onAnchor = $this->getService('events.manager')->createEvent(['KdybyModule\CliPresenter', 'onAnchor'],
			$service->onAnchor, null, false);
		return $service;
	}


	public function createServiceApplication__26(): NetteModule\ErrorPresenter
	{
		$service = new NetteModule\ErrorPresenter($this->getService('tracy.logger'));
		return $service;
	}


	public function createServiceApplication__27(): NetteModule\MicroPresenter
	{
		$service = new NetteModule\MicroPresenter($this, $this->getService('http.request'),
			$this->getService('routing.router'));
		return $service;
	}


	public function createServiceApplication__3(): LogModule\Presenters\LogPresenter
	{
		$service = new LogModule\Presenters\LogPresenter;
		$service->injectPrimary($this, $this->getService('application.presenterFactory'),
			$this->getService('routing.router'), $this->getService('http.request'),
			$this->getService('http.response'), $this->getService('session.session'),
			$this->getService('security.user'), $this->getService('latte.templateFactory'));
		$service->userService = $this->getService('user.userService');
		$service->user = $this->getService('security.user');
		$service->translator = $this->getService('translation.default');
		$service->menuitemService = $this->getService('backend.default.MenuitemService');
		$service->logService = $this->getService('log.logService');
		$service->iStorage = $this->getService('cache.storage');
		$service->dirService = $this->getService('backend.default.DirService');
		$service->datagridFactory = $this->getService('backend.default.DatagridFactory');
		$service->database = $this->getService('database.default.context');
		$service->clientService = $this->getService('client.clientService');
		$service->appSetupService = $this->getService('backend.default.AppSetupService');
		$service->invalidLinkMode = 5;
		$service->onShutdown = $this->getService('events.manager')->createEvent(['LogModule\Presenters\LogPresenter', 'onShutdown'],
			$service->onShutdown, null, false);
		$service->onAnchor = $this->getService('events.manager')->createEvent(['LogModule\Presenters\LogPresenter', 'onAnchor'],
			$service->onAnchor, null, false);
		return $service;
	}


	public function createServiceApplication__4(): MailerModule\Presenters\MailerPresenter
	{
		$service = new MailerModule\Presenters\MailerPresenter;
		$service->injectPrimary($this, $this->getService('application.presenterFactory'),
			$this->getService('routing.router'), $this->getService('http.request'),
			$this->getService('http.response'), $this->getService('session.session'),
			$this->getService('security.user'), $this->getService('latte.templateFactory'));
		$service->userService = $this->getService('user.userService');
		$service->user = $this->getService('security.user');
		$service->translator = $this->getService('translation.default');
		$service->menuitemService = $this->getService('backend.default.MenuitemService');
		$service->mailerService = $this->getService('mailer.mailerService');
		$service->mailerFormFactory = $this->getService('mailer.mailerFormFactory');
		$service->mailerDefaultService = $this->getService('mailer.mailerDefaultService');
		$service->logService = $this->getService('log.logService');
		$service->iStorage = $this->getService('cache.storage');
		$service->dirService = $this->getService('backend.default.DirService');
		$service->datagridFactory = $this->getService('backend.default.DatagridFactory');
		$service->database = $this->getService('database.default.context');
		$service->clientService = $this->getService('client.clientService');
		$service->appSetupService = $this->getService('backend.default.AppSetupService');
		$service->invalidLinkMode = 5;
		$service->onShutdown = $this->getService('events.manager')->createEvent(['MailerModule\Presenters\MailerPresenter', 'onShutdown'],
			$service->onShutdown, null, false);
		$service->onAnchor = $this->getService('events.manager')->createEvent(['MailerModule\Presenters\MailerPresenter', 'onAnchor'],
			$service->onAnchor, null, false);
		return $service;
	}


	public function createServiceApplication__5(): MultimediaModule\Presenters\MultimediaPresenter
	{
		$service = new MultimediaModule\Presenters\MultimediaPresenter;
		$service->injectPrimary($this, $this->getService('application.presenterFactory'),
			$this->getService('routing.router'), $this->getService('http.request'),
			$this->getService('http.response'), $this->getService('session.session'),
			$this->getService('security.user'), $this->getService('latte.templateFactory'));
		$service->userService = $this->getService('user.userService');
		$service->user = $this->getService('security.user');
		$service->translator = $this->getService('translation.default');
		$service->translatedFormFactory = $this->getService('backend.default.TranslatedFormFactory');
		$service->multimedia_folderService = $this->getService('multimedia.multimediaFolderService');
		$service->multimediaService = $this->getService('multimedia.multimediaService');
		$service->menuitemService = $this->getService('backend.default.MenuitemService');
		$service->logService = $this->getService('log.logService');
		$service->iStorage = $this->getService('cache.storage');
		$service->iMultimediaSaver = $this->getService('multimedia.iMultimediaSaver');
		$service->dirService = $this->getService('backend.default.DirService');
		$service->database = $this->getService('database.default.context');
		$service->clientService = $this->getService('client.clientService');
		$service->appSetupService = $this->getService('backend.default.AppSetupService');
		$service->invalidLinkMode = 5;
		$service->onShutdown = $this->getService('events.manager')->createEvent(['MultimediaModule\Presenters\MultimediaPresenter', 'onShutdown'],
			$service->onShutdown, null, false);
		$service->onAnchor = $this->getService('events.manager')->createEvent(['MultimediaModule\Presenters\MultimediaPresenter', 'onAnchor'],
			$service->onAnchor, null, false);
		return $service;
	}


	public function createServiceApplication__6(): ProfileModule\Presenters\ProfilePresenter
	{
		$service = new ProfileModule\Presenters\ProfilePresenter;
		$service->injectPrimary($this, $this->getService('application.presenterFactory'),
			$this->getService('routing.router'), $this->getService('http.request'),
			$this->getService('http.response'), $this->getService('session.session'),
			$this->getService('security.user'), $this->getService('latte.templateFactory'));
		$service->userService = $this->getService('user.userService');
		$service->user = $this->getService('security.user');
		$service->updateProfileFormFactory = $this->getService('profile.updateProfileFormFactory');
		$service->translator = $this->getService('translation.default');
		$service->ticketFormFactory = $this->getService('profile.ticketFormFactory');
		$service->menuitemService = $this->getService('backend.default.MenuitemService');
		$service->logService = $this->getService('log.logService');
		$service->iStorage = $this->getService('cache.storage');
		$service->dirService = $this->getService('backend.default.DirService');
		$service->datagridFactory = $this->getService('backend.default.DatagridFactory');
		$service->database = $this->getService('database.default.context');
		$service->clientService = $this->getService('client.clientService');
		$service->appSetupService = $this->getService('backend.default.AppSetupService');
		$service->invalidLinkMode = 5;
		$service->onShutdown = $this->getService('events.manager')->createEvent(['ProfileModule\Presenters\ProfilePresenter', 'onShutdown'],
			$service->onShutdown, null, false);
		$service->onAnchor = $this->getService('events.manager')->createEvent(['ProfileModule\Presenters\ProfilePresenter', 'onAnchor'],
			$service->onAnchor, null, false);
		return $service;
	}


	public function createServiceApplication__7(): ProjectModule\Presenters\DashboardPresenter
	{
		$service = new ProjectModule\Presenters\DashboardPresenter;
		$service->injectPrimary($this, $this->getService('application.presenterFactory'),
			$this->getService('routing.router'), $this->getService('http.request'),
			$this->getService('http.response'), $this->getService('session.session'),
			$this->getService('security.user'), $this->getService('latte.templateFactory'));
		$service->userService = $this->getService('user.userService');
		$service->user = $this->getService('security.user');
		$service->translator = $this->getService('translation.default');
		$service->projectService = $this->getService('project.projectService');
		$service->projectFormFactory = $this->getService('project.projectFormFactory');
		$service->menuitemService = $this->getService('backend.default.MenuitemService');
		$service->logService = $this->getService('log.logService');
		$service->iStorage = $this->getService('cache.storage');
		$service->dirService = $this->getService('backend.default.DirService');
		$service->datagridFactory = $this->getService('backend.default.DatagridFactory');
		$service->database = $this->getService('database.default.context');
		$service->clientService = $this->getService('client.clientService');
		$service->appSetupService = $this->getService('backend.default.AppSetupService');
		$service->invalidLinkMode = 5;
		$service->onShutdown = $this->getService('events.manager')->createEvent(['ProjectModule\Presenters\DashboardPresenter', 'onShutdown'],
			$service->onShutdown, null, false);
		$service->onAnchor = $this->getService('events.manager')->createEvent(['ProjectModule\Presenters\DashboardPresenter', 'onAnchor'],
			$service->onAnchor, null, false);
		return $service;
	}


	public function createServiceApplication__8(): ProjectModule\Presenters\IssuesPresenter
	{
		$service = new ProjectModule\Presenters\IssuesPresenter;
		$service->injectPrimary($this, $this->getService('application.presenterFactory'),
			$this->getService('routing.router'), $this->getService('http.request'),
			$this->getService('http.response'), $this->getService('session.session'),
			$this->getService('security.user'), $this->getService('latte.templateFactory'));
		$service->userService = $this->getService('user.userService');
		$service->user = $this->getService('security.user');
		$service->translator = $this->getService('translation.default');
		$service->simpleEntityService = $this->getService('backend.default.SimpleEntityService');
		$service->projectService = $this->getService('project.projectService');
		$service->projectFormFactory = $this->getService('project.projectFormFactory');
		$service->menuitemService = $this->getService('backend.default.MenuitemService');
		$service->logService = $this->getService('log.logService');
		$service->issueFormFactory = $this->getService('project.IssueFormFactory');
		$service->issueCommentFormFactory = $this->getService('project.IssueCommentFormFactory');
		$service->iStorage = $this->getService('cache.storage');
		$service->dirService = $this->getService('backend.default.DirService');
		$service->datagridFactory = $this->getService('backend.default.DatagridFactory');
		$service->database = $this->getService('database.default.context');
		$service->clientService = $this->getService('client.clientService');
		$service->appSetupService = $this->getService('backend.default.AppSetupService');
		$service->invalidLinkMode = 5;
		$service->onShutdown = $this->getService('events.manager')->createEvent(['ProjectModule\Presenters\IssuesPresenter', 'onShutdown'],
			$service->onShutdown, null, false);
		$service->onAnchor = $this->getService('events.manager')->createEvent(['ProjectModule\Presenters\IssuesPresenter', 'onAnchor'],
			$service->onAnchor, null, false);
		return $service;
	}


	public function createServiceApplication__9(): ProjectModule\Presenters\ManagementPresenter
	{
		$service = new ProjectModule\Presenters\ManagementPresenter;
		$service->injectPrimary($this, $this->getService('application.presenterFactory'),
			$this->getService('routing.router'), $this->getService('http.request'),
			$this->getService('http.response'), $this->getService('session.session'),
			$this->getService('security.user'), $this->getService('latte.templateFactory'));
		$service->userService = $this->getService('user.userService');
		$service->user = $this->getService('security.user');
		$service->translator = $this->getService('translation.default');
		$service->projectService = $this->getService('project.projectService');
		$service->projectFormFactory = $this->getService('project.projectFormFactory');
		$service->menuitemService = $this->getService('backend.default.MenuitemService');
		$service->logService = $this->getService('log.logService');
		$service->iStorage = $this->getService('cache.storage');
		$service->dirService = $this->getService('backend.default.DirService');
		$service->datagridFactory = $this->getService('backend.default.DatagridFactory');
		$service->database = $this->getService('database.default.context');
		$service->clientService = $this->getService('client.clientService');
		$service->appSetupService = $this->getService('backend.default.AppSetupService');
		$service->invalidLinkMode = 5;
		$service->onShutdown = $this->getService('events.manager')->createEvent(['ProjectModule\Presenters\ManagementPresenter', 'onShutdown'],
			$service->onShutdown, null, false);
		$service->onAnchor = $this->getService('events.manager')->createEvent(['ProjectModule\Presenters\ManagementPresenter', 'onAnchor'],
			$service->onAnchor, null, false);
		return $service;
	}


	public function createServiceApplication__application(): Nette\Application\Application
	{
		$service = new Nette\Application\Application($this->getService('application.presenterFactory'),
			$this->getService('routing.router'), $this->getService('http.request'),
			$this->getService('http.response'));
		$service->catchExceptions = false;
		$service->errorPresenter = 'Error';
		Nette\Bridges\ApplicationTracy\RoutingPanel::initializePanel($service);
		$this->getService('tracy.bar')->addPanel(new Nette\Bridges\ApplicationTracy\RoutingPanel($this->getService('routing.router'),
			$this->getService('http.request'), $this->getService('application.presenterFactory')));
		$service->onRequest[] = [
			$this->getService('translation.userLocaleResolver.param'),
			'onRequest',
		];
		$self = $this; $service->onStartup[] = function () use ($self) { $self->getService('translation.default'); };
		$service->onRequest[] = [$this->getService('translation.panel'), 'onRequest'];
		$service->onStartup = $this->getService('events.manager')->createEvent(['Nette\Application\Application', 'onStartup'],
			$service->onStartup, null, false);
		$service->onShutdown = $this->getService('events.manager')->createEvent(['Nette\Application\Application', 'onShutdown'],
			$service->onShutdown, null, false);
		$service->onRequest = $this->getService('events.manager')->createEvent(['Nette\Application\Application', 'onRequest'],
			$service->onRequest, null, false);
		$service->onPresenter = $this->getService('events.manager')->createEvent(['Nette\Application\Application', 'onPresenter'],
			$service->onPresenter, null, false);
		$service->onResponse = $this->getService('events.manager')->createEvent(['Nette\Application\Application', 'onResponse'],
			$service->onResponse, null, false);
		$service->onError = $this->getService('events.manager')->createEvent(['Nette\Application\Application', 'onError'],
			$service->onError, null, false);
		return $service;
	}


	public function createServiceApplication__linkGenerator(): Nette\Application\LinkGenerator
	{
		$service = new Nette\Application\LinkGenerator($this->getService('routing.router'),
			$this->getService('http.request')->getUrl(), $this->getService('application.presenterFactory'));
		return $service;
	}


	public function createServiceApplication__presenterFactory(): Nette\Application\IPresenterFactory
	{
		$service = new Nette\Application\PresenterFactory(new Nette\Bridges\ApplicationDI\PresenterFactoryCallback($this, 5, 'C:\MAMP\htdocs\Juno\app/../temp/cache/Nette%5CBridges%5CApplicationDI%5CApplicationExtension'));
		$service->setMapping([
			'*' => 'App\*Module\Presenters\*Presenter',
			'Admin' => '*Module\Presenters\*Presenter',
			'Front' => 'Front\*Module\Presenters\*Presenter',
		]);
		return $service;
	}


	public function createServiceAuthentication__authentication(): AuthenticationModule\Classes\Authentication
	{
		$service = new AuthenticationModule\Classes\Authentication($this->getService('user.userService'),
			$this->getService('backend.default.HydratorService'));
		return $service;
	}


	public function createServiceAuthentication__loginFormFactory(): AuthenticationModule\Factories\LoginFormFactory
	{
		$service = new AuthenticationModule\Factories\LoginFormFactory($this->getService('security.user'),
			$this->getService('backend.default.TranslatedFormFactory'), $this->getService('translation.default'),
			$this->getService('log.logService'), $this->getService('user.userRepository'),
			$this->getService('user.userService'));
		return $service;
	}


	public function createServiceAuthorizator__Authorizator(): AuthorizatorModule\Classes\Authorizator
	{
		$service = new AuthorizatorModule\Classes\Authorizator($this->getService('database.default.context'),
			$this->getService('cache.storage'));
		return $service;
	}


	public function createServiceBackend__default__AddressRepository(): DefaultModule\Repositories\AddressRepository
	{
		$service = new DefaultModule\Repositories\AddressRepository($this->getService('doctrine.default.entityManager'));
		return $service;
	}


	public function createServiceBackend__default__AddressService(): DefaultModule\Services\AddressService
	{
		$service = new DefaultModule\Services\AddressService($this->getService('backend.default.AddressRepository'));
		return $service;
	}


	public function createServiceBackend__default__AppSetupService(): DefaultModule\Services\AppSetupService
	{
		$service = new DefaultModule\Services\AppSetupService;
		return $service;
	}


	public function createServiceBackend__default__AutocompleteRepository(): DefaultModule\Repositories\AutocompleteRepository
	{
		$service = new DefaultModule\Repositories\AutocompleteRepository($this->getService('doctrine.default.entityManager'));
		return $service;
	}


	public function createServiceBackend__default__AutocompleteService(): DefaultModule\Services\AutocompleteService
	{
		$service = new DefaultModule\Services\AutocompleteService($this->getService('backend.default.AutocompleteRepository'));
		return $service;
	}


	public function createServiceBackend__default__BillingAddressRepository(): DefaultModule\Repositories\BillingAddressRepository
	{
		$service = new DefaultModule\Repositories\BillingAddressRepository($this->getService('doctrine.default.entityManager'));
		return $service;
	}


	public function createServiceBackend__default__BillingAddressService(): DefaultModule\Services\BillingAddressService
	{
		$service = new DefaultModule\Services\BillingAddressService($this->getService('backend.default.BillingAddressRepository'));
		return $service;
	}


	public function createServiceBackend__default__CurrencyRepository(): DefaultModule\Repositories\CurrencyRepository
	{
		$service = new DefaultModule\Repositories\CurrencyRepository($this->getService('doctrine.default.entityManager'));
		return $service;
	}


	public function createServiceBackend__default__CurrencyService(): DefaultModule\Services\CurrencyService
	{
		$service = new DefaultModule\Services\CurrencyService($this->getService('backend.default.CurrencyRepository'));
		return $service;
	}


	public function createServiceBackend__default__DatagridFactory(): DefaultModule\Factories\DatagridFactory
	{
		$service = new DefaultModule\Factories\DatagridFactory($this->getService('translation.default'),
			$this->getService('backend.default.DirService'));
		return $service;
	}


	public function createServiceBackend__default__DirService(): DefaultModule\Services\DirService
	{
		$service = new DefaultModule\Services\DirService('C:\MAMP\htdocs\Juno\www', 'C:\MAMP\htdocs\Juno\app',
			$this->getService('http.request'));
		return $service;
	}


	public function createServiceBackend__default__GeneralSearchFormFactory(): DefaultModule\Factories\GeneralSearchFormFactory
	{
		$service = new DefaultModule\Factories\GeneralSearchFormFactory($this->getService('security.user'),
			$this->getService('backend.default.TranslatedFormFactory'));
		return $service;
	}


	public function createServiceBackend__default__HydratorService(): DefaultModule\Services\HydratorService
	{
		$service = new DefaultModule\Services\HydratorService($this->getService('doctrine.default.entityManager'));
		return $service;
	}


	public function createServiceBackend__default__IGeneralSearch(): DefaultModule\Interfaces\IGeneralSearch
	{
		return new class ($this) implements DefaultModule\Interfaces\IGeneralSearch {
			private $container;


			public function __construct(Container_b2c4047df2 $container)
			{
				$this->container = $container;
			}


			public function create($query): DefaultModule\Controls\GeneralSearch
			{
				$service = new DefaultModule\Controls\GeneralSearch($query, $this->container->getService('security.user'),
					$this->container);
				$service->onAnchor = $this->container->getService('events.manager')->createEvent(['DefaultModule\Controls\GeneralSearch', 'onAnchor'],
					$service->onAnchor, null, false);
				return $service;
			}
		};
	}


	public function createServiceBackend__default__ILinkResolverFactory(): DefaultModule\Interfaces\ILinkResolverFactory
	{
		return new class ($this) implements DefaultModule\Interfaces\ILinkResolverFactory {
			private $container;


			public function __construct(Container_b2c4047df2 $container)
			{
				$this->container = $container;
			}


			public function create($string): DefaultModule\Classes\LinkResolver
			{
				$service = new DefaultModule\Classes\LinkResolver($string, $this->container->getService('routing.router'),
					$this->container->getService('http.request'));
				return $service;
			}
		};
	}


	public function createServiceBackend__default__MenuitemRepository(): DefaultModule\Repositories\MenuitemRepository
	{
		$service = new DefaultModule\Repositories\MenuitemRepository($this->getService('doctrine.default.entityManager'));
		return $service;
	}


	public function createServiceBackend__default__MenuitemService(): DefaultModule\Services\MenuitemService
	{
		$service = new DefaultModule\Services\MenuitemService($this->getService('backend.default.MenuitemRepository'));
		return $service;
	}


	public function createServiceBackend__default__MyMailer(): DefaultModule\Classes\MyMailer
	{
		$service = new DefaultModule\Classes\MyMailer($this->getService('settings.settingsService'));
		return $service;
	}


	public function createServiceBackend__default__SimpleEntityService(): DefaultModule\Services\SimpleEntityService
	{
		$service = new DefaultModule\Services\SimpleEntityService($this->getService('doctrine.default.entityManager'));
		return $service;
	}


	public function createServiceBackend__default__TranslatedFormFactory(): DefaultModule\Factories\TranslatedFormFactory
	{
		$service = new DefaultModule\Factories\TranslatedFormFactory($this->getService('translation.default'));
		return $service;
	}


	public function createServiceBackend__default__VisualPaginatorFactory(): DefaultModule\Factories\VisualPaginatorFactory
	{
		$service = new DefaultModule\Factories\VisualPaginatorFactory($this->getService('backend.default.DirService'));
		return $service;
	}


	public function createServiceCache__journal(): Nette\Caching\Storages\IJournal
	{
		$service = new Nette\Caching\Storages\SQLiteJournal('C:\MAMP\htdocs\Juno\app/../temp/cache/journal.s3db');
		return $service;
	}


	public function createServiceCache__storage(): Nette\Caching\IStorage
	{
		$service = new Nette\Caching\Storages\FileStorage('C:\MAMP\htdocs\Juno\app/../temp/cache',
			$this->getService('cache.journal'));
		return $service;
	}


	public function createServiceClient__clientRepository(): ClientModule\Repositories\ClientRepository
	{
		$service = new ClientModule\Repositories\ClientRepository($this->getService('doctrine.default.entityManager'));
		return $service;
	}


	public function createServiceClient__clientService(): ClientModule\Services\ClientService
	{
		$service = new ClientModule\Services\ClientService($this->getService('client.clientRepository'));
		return $service;
	}


	public function createServiceConsole__application(): Kdyby\Console\Application
	{
		$service = new Kdyby\Console\Application('Nette Framework', 'unknown');
		$service->setHelperSet($this->getService('console.helperSet'));
		$service->injectServiceLocator($this);
		return $service;
	}


	public function createServiceConsole__helperSet(): Symfony\Component\Console\Helper\HelperSet
	{
		$service = new Symfony\Component\Console\Helper\HelperSet;
		$service->set(new Symfony\Component\Console\Helper\ProcessHelper);
		$service->set(new Symfony\Component\Console\Helper\DescriptorHelper);
		$service->set(new Symfony\Component\Console\Helper\FormatterHelper);
		$service->set(new Symfony\Component\Console\Helper\QuestionHelper);
		$service->set(new Symfony\Component\Console\Helper\DebugFormatterHelper);
		$service->set(new Kdyby\Console\Helpers\PresenterHelper($this->getService('application.application')));
		$service->set(new Kdyby\Console\ContainerHelper($this), 'dic');
		return $service;
	}


	public function createServiceContainer(): Nette\DI\Container
	{
		return $this;
	}


	public function createServiceDatabase__default__connection(): Nette\Database\Connection
	{
		$service = new Nette\Database\Connection('mysql:host=localhost;port=3306;dbname=juno',
			'root', 'root', null);
		$this->getService('tracy.blueScreen')->addPanel('Nette\Bridges\DatabaseTracy\ConnectionPanel::renderException');
		Nette\Database\Helpers::createDebugPanel($service, true, 'default');
		$service->onConnect = $this->getService('events.manager')->createEvent(['Nette\Database\Connection', 'onConnect'],
			$service->onConnect, null, false);
		$service->onQuery = $this->getService('events.manager')->createEvent(['Nette\Database\Connection', 'onQuery'],
			$service->onQuery, null, false);
		return $service;
	}


	public function createServiceDatabase__default__context(): Nette\Database\Context
	{
		$service = new Nette\Database\Context($this->getService('database.default.connection'),
			$this->getService('database.default.structure'), $this->getService('database.default.conventions'),
			$this->getService('cache.storage'));
		return $service;
	}


	public function createServiceDatabase__default__conventions(): Nette\Database\Conventions\DiscoveredConventions
	{
		$service = new Nette\Database\Conventions\DiscoveredConventions($this->getService('database.default.structure'));
		return $service;
	}


	public function createServiceDatabase__default__structure(): Nette\Database\Structure
	{
		$service = new Nette\Database\Structure($this->getService('database.default.connection'),
			$this->getService('cache.storage'));
		return $service;
	}


	public function createServiceDoctrine__cache__default__dbalResult(): Doctrine\Common\Cache\Cache
	{
		$service = new Kdyby\DoctrineCache\Cache($this->getService('cache.storage'), 'Doctrine.Default.dbalResult',
			false);
		$service->setNamespace('Kdyby_doctrine.cache.default.dbalResult_a34dad6d');
		return $service;
	}


	public function createServiceDoctrine__cache__default__hydration(): Doctrine\Common\Cache\Cache
	{
		$service = new Kdyby\DoctrineCache\Cache($this->getService('cache.storage'), 'Doctrine.Default.hydration',
			false);
		$service->setNamespace('Kdyby_doctrine.cache.default.hydration_a34dad6d');
		return $service;
	}


	public function createServiceDoctrine__cache__default__metadata(): Doctrine\Common\Cache\Cache
	{
		$service = new Kdyby\DoctrineCache\Cache($this->getService('cache.storage'), 'Doctrine.Default.metadata',
			false);
		$service->setNamespace('Kdyby_doctrine.cache.default.metadata_a34dad6d');
		return $service;
	}


	public function createServiceDoctrine__cache__default__ormResult(): Doctrine\Common\Cache\Cache
	{
		$service = new Kdyby\DoctrineCache\Cache($this->getService('cache.storage'), 'Doctrine.Default.ormResult',
			false);
		$service->setNamespace('Kdyby_doctrine.cache.default.ormResult_a34dad6d');
		return $service;
	}


	public function createServiceDoctrine__cache__default__query(): Doctrine\Common\Cache\Cache
	{
		$service = new Kdyby\DoctrineCache\Cache($this->getService('cache.storage'), 'Doctrine.Default.query',
			false);
		$service->setNamespace('Kdyby_doctrine.cache.default.query_a34dad6d');
		return $service;
	}


	public function createServiceDoctrine__cli__0(): Kdyby\Doctrine\Console\Proxy\CacheClearCollectionRegionCommand
	{
		$service = new Kdyby\Doctrine\Console\Proxy\CacheClearCollectionRegionCommand;
		return $service;
	}


	public function createServiceDoctrine__cli__1(): Kdyby\Doctrine\Console\Proxy\CacheClearEntityRegionCommand
	{
		$service = new Kdyby\Doctrine\Console\Proxy\CacheClearEntityRegionCommand;
		return $service;
	}


	public function createServiceDoctrine__cli__10(): Kdyby\Doctrine\Console\Proxy\InfoCommand
	{
		$service = new Kdyby\Doctrine\Console\Proxy\InfoCommand;
		return $service;
	}


	public function createServiceDoctrine__cli__11(): Kdyby\Doctrine\Console\Proxy\MappingDescribeCommand
	{
		$service = new Kdyby\Doctrine\Console\Proxy\MappingDescribeCommand;
		return $service;
	}


	public function createServiceDoctrine__cli__12(): Kdyby\Doctrine\Console\Proxy\ReservedWordsCommand
	{
		$service = new Kdyby\Doctrine\Console\Proxy\ReservedWordsCommand;
		return $service;
	}


	public function createServiceDoctrine__cli__13(): Kdyby\Doctrine\Console\Proxy\SchemaCreateCommand
	{
		$service = new Kdyby\Doctrine\Console\Proxy\SchemaCreateCommand;
		return $service;
	}


	public function createServiceDoctrine__cli__14(): Kdyby\Doctrine\Console\Proxy\SchemaUpdateCommand
	{
		$service = new Kdyby\Doctrine\Console\Proxy\SchemaUpdateCommand;
		return $service;
	}


	public function createServiceDoctrine__cli__15(): Kdyby\Doctrine\Console\Proxy\SchemaDropCommand
	{
		$service = new Kdyby\Doctrine\Console\Proxy\SchemaDropCommand;
		return $service;
	}


	public function createServiceDoctrine__cli__16(): Kdyby\Doctrine\Console\Proxy\ValidateSchemaCommand
	{
		$service = new Kdyby\Doctrine\Console\Proxy\ValidateSchemaCommand;
		return $service;
	}


	public function createServiceDoctrine__cli__2(): Kdyby\Doctrine\Console\Proxy\CacheClearMetadataCommand
	{
		$service = new Kdyby\Doctrine\Console\Proxy\CacheClearMetadataCommand;
		return $service;
	}


	public function createServiceDoctrine__cli__3(): Kdyby\Doctrine\Console\Proxy\CacheClearQueryCommand
	{
		$service = new Kdyby\Doctrine\Console\Proxy\CacheClearQueryCommand;
		return $service;
	}


	public function createServiceDoctrine__cli__4(): Kdyby\Doctrine\Console\Proxy\CacheClearQueryRegionCommand
	{
		$service = new Kdyby\Doctrine\Console\Proxy\CacheClearQueryRegionCommand;
		return $service;
	}


	public function createServiceDoctrine__cli__5(): Kdyby\Doctrine\Console\Proxy\CacheClearResultCommand
	{
		$service = new Kdyby\Doctrine\Console\Proxy\CacheClearResultCommand;
		return $service;
	}


	public function createServiceDoctrine__cli__6(): Kdyby\Doctrine\Console\Proxy\ConvertMappingCommand
	{
		$service = new Kdyby\Doctrine\Console\Proxy\ConvertMappingCommand;
		return $service;
	}


	public function createServiceDoctrine__cli__7(): Kdyby\Doctrine\Console\Proxy\GenerateEntitiesCommand
	{
		$service = new Kdyby\Doctrine\Console\Proxy\GenerateEntitiesCommand;
		return $service;
	}


	public function createServiceDoctrine__cli__8(): Kdyby\Doctrine\Console\Proxy\GenerateProxiesCommand
	{
		$service = new Kdyby\Doctrine\Console\Proxy\GenerateProxiesCommand;
		return $service;
	}


	public function createServiceDoctrine__cli__9(): Kdyby\Doctrine\Console\Proxy\ImportCommand
	{
		$service = new Kdyby\Doctrine\Console\Proxy\ImportCommand;
		return $service;
	}


	public function createServiceDoctrine__dao($entityName): Kdyby\Doctrine\EntityDao
	{
		$service = $this->getService('doctrine.default.entityManager')->getDao($entityName);
		return $service;
	}


	public function createServiceDoctrine__daoFactory(): Kdyby\Doctrine\EntityDaoFactory
	{
		return new class ($this) implements Kdyby\Doctrine\EntityDaoFactory {
			private $container;


			public function __construct(Container_b2c4047df2 $container)
			{
				$this->container = $container;
			}


			public function create($entityName): Kdyby\Doctrine\EntityDao
			{
				$service = $this->container->getService('doctrine.default.entityManager')->getDao($entityName);
				return $service;
			}
		};
	}


	public function createServiceDoctrine__default__cacheCleaner(): Kdyby\Doctrine\Tools\CacheCleaner
	{
		$service = new Kdyby\Doctrine\Tools\CacheCleaner($this->getService('doctrine.default.entityManager'));
		$service->addCacheStorage($this->getService('annotations.cache.annotations'));
		return $service;
	}


	public function createServiceDoctrine__default__connection(): Kdyby\Doctrine\Connection
	{
		$service = Kdyby\Doctrine\Connection::create([
			'dbname' => 'juno',
			'host' => '127.0.0.1',
			'port' => 3306,
			'user' => 'root',
			'password' => 'root',
			'charset' => 'UTF8',
			'driver' => 'pdo_mysql',
			'driverClass' => null,
			'options' => null,
			'path' => null,
			'memory' => null,
			'unix_socket' => null,
			'platformService' => null,
			'defaultTableOptions' => [],
			'schemaFilter' => null,
			'debug' => true,
		], $this->getService('doctrine.default.dbalConfiguration'), $this->getService('doctrine.default.evm'));
		if (!$service instanceof Kdyby\Doctrine\Connection) {
			throw new Nette\UnexpectedValueException('Unable to create service \'doctrine.default.connection\', value returned by factory is not Kdyby\Doctrine\Connection type.');
		}
		$service->setSchemaTypes([
			'enum' => 'enum',
			'point' => 'point',
			'lineString' => 'lineString',
			'multiLineString' => 'multiLineString',
			'polygon' => 'polygon',
			'multiPolygon' => 'multiPolygon',
			'geometryCollection' => 'geometryCollection',
		]);
		$service->setDbalTypes([
			'enum' => 'Kdyby\Doctrine\Types\Enum',
			'point' => 'Kdyby\Doctrine\Types\Point',
			'lineString' => 'Kdyby\Doctrine\Types\LineString',
			'multiLineString' => 'Kdyby\Doctrine\Types\MultiLineString',
			'polygon' => 'Kdyby\Doctrine\Types\Polygon',
			'multiPolygon' => 'Kdyby\Doctrine\Types\MultiPolygon',
			'geometryCollection' => 'Kdyby\Doctrine\Types\GeometryCollection',
		]);
		$panel = $this->getService('doctrine.default.diagnosticsPanel')->bindConnection($service);
		$panel->enableLogging();
		return $service;
	}


	public function createServiceDoctrine__default__dbalConfiguration(): Doctrine\DBAL\Configuration
	{
		$service = new Doctrine\DBAL\Configuration;
		$service->setResultCacheImpl($this->getService('doctrine.cache.default.dbalResult'));
		$service->setSQLLogger(new Doctrine\DBAL\Logging\LoggerChain);
		$service->setFilterSchemaAssetsExpression(null);
		return $service;
	}


	public function createServiceDoctrine__default__diagnosticsPanel(): Kdyby\Doctrine\Diagnostics\Panel
	{
		$service = new Kdyby\Doctrine\Diagnostics\Panel;
		return $service;
	}


	public function createServiceDoctrine__default__driver__App__annotationsImpl(): Doctrine\Common\Persistence\Mapping\Driver\MappingDriver
	{
		$service = new Doctrine\ORM\Mapping\Driver\AnnotationDriver($this->getService('annotations.reader'),
			['C:\MAMP\htdocs\Juno\app']);
		return $service;
	}


	public function createServiceDoctrine__default__driver__AuthorizatorModule__annotationsImpl(): Doctrine\Common\Persistence\Mapping\Driver\MappingDriver
	{
		$service = new Doctrine\ORM\Mapping\Driver\AnnotationDriver($this->getService('annotations.reader'),
			[
			'C:\MAMP\htdocs\Juno\app/AdminModule/Modules/AuthorizatorModule/model/Entities',
		]);
		return $service;
	}


	public function createServiceDoctrine__default__driver__ClientModule__annotationsImpl(): Doctrine\Common\Persistence\Mapping\Driver\MappingDriver
	{
		$service = new Doctrine\ORM\Mapping\Driver\AnnotationDriver($this->getService('annotations.reader'),
			[
			'C:\MAMP\htdocs\Juno\app/AdminModule/Modules/ClientModule/model/Entities',
		]);
		return $service;
	}


	public function createServiceDoctrine__default__driver__DefaultModule__annotationsImpl(): Doctrine\Common\Persistence\Mapping\Driver\MappingDriver
	{
		$service = new Doctrine\ORM\Mapping\Driver\AnnotationDriver($this->getService('annotations.reader'),
			['C:\MAMP\htdocs\Juno\app/AdminModule/DefaultModule']);
		return $service;
	}


	public function createServiceDoctrine__default__driver__HelpModule__annotationsImpl(): Doctrine\Common\Persistence\Mapping\Driver\MappingDriver
	{
		$service = new Doctrine\ORM\Mapping\Driver\AnnotationDriver($this->getService('annotations.reader'),
			[
			'C:\MAMP\htdocs\Juno\app/AdminModule/Modules/HelpModule/model/Entities',
		]);
		return $service;
	}


	public function createServiceDoctrine__default__driver__HomepageModule__annotationsImpl(): Doctrine\Common\Persistence\Mapping\Driver\MappingDriver
	{
		$service = new Doctrine\ORM\Mapping\Driver\AnnotationDriver($this->getService('annotations.reader'),
			[
			'C:\MAMP\htdocs\Juno\app/AdminModule/Modules/HomepageModule/model/Entities',
		]);
		return $service;
	}


	public function createServiceDoctrine__default__driver__Kdyby_Doctrine__annotationsImpl(): Doctrine\Common\Persistence\Mapping\Driver\MappingDriver
	{
		$service = new Doctrine\ORM\Mapping\Driver\AnnotationDriver($this->getService('annotations.reader'),
			[
			'C:\MAMP\htdocs\Juno\vendor\kdyby\doctrine\src\Kdyby\Doctrine\DI/../Entities',
		]);
		return $service;
	}


	public function createServiceDoctrine__default__driver__LogModule__annotationsImpl(): Doctrine\Common\Persistence\Mapping\Driver\MappingDriver
	{
		$service = new Doctrine\ORM\Mapping\Driver\AnnotationDriver($this->getService('annotations.reader'),
			[
			'C:\MAMP\htdocs\Juno\app/AdminModule/Modules/LogModule/model/Entities',
		]);
		return $service;
	}


	public function createServiceDoctrine__default__driver__MailerModule__annotationsImpl(): Doctrine\Common\Persistence\Mapping\Driver\MappingDriver
	{
		$service = new Doctrine\ORM\Mapping\Driver\AnnotationDriver($this->getService('annotations.reader'),
			[
			'C:\MAMP\htdocs\Juno\app/AdminModule/Modules/MailerModule/model/Entities',
		]);
		return $service;
	}


	public function createServiceDoctrine__default__driver__MultimediaModule__annotationsImpl(): Doctrine\Common\Persistence\Mapping\Driver\MappingDriver
	{
		$service = new Doctrine\ORM\Mapping\Driver\AnnotationDriver($this->getService('annotations.reader'),
			[
			'C:\MAMP\htdocs\Juno\app/AdminModule/Modules/MultimediaModule/model/Entities',
		]);
		return $service;
	}


	public function createServiceDoctrine__default__driver__ProfileModule__annotationsImpl(): Doctrine\Common\Persistence\Mapping\Driver\MappingDriver
	{
		$service = new Doctrine\ORM\Mapping\Driver\AnnotationDriver($this->getService('annotations.reader'),
			[
			'C:\MAMP\htdocs\Juno\app/AdminModule/Modules/ProfileModule/model/Entities',
		]);
		return $service;
	}


	public function createServiceDoctrine__default__driver__ProjectModule__annotationsImpl(): Doctrine\Common\Persistence\Mapping\Driver\MappingDriver
	{
		$service = new Doctrine\ORM\Mapping\Driver\AnnotationDriver($this->getService('annotations.reader'),
			[
			'C:\MAMP\htdocs\Juno\app/AdminModule/Modules/ProjectModule/model/Entities',
		]);
		return $service;
	}


	public function createServiceDoctrine__default__driver__SettingsModule__annotationsImpl(): Doctrine\Common\Persistence\Mapping\Driver\MappingDriver
	{
		$service = new Doctrine\ORM\Mapping\Driver\AnnotationDriver($this->getService('annotations.reader'),
			[
			'C:\MAMP\htdocs\Juno\app/AdminModule/Modules/SettingsModule/model/Entities',
		]);
		return $service;
	}


	public function createServiceDoctrine__default__driver__UserModule__annotationsImpl(): Doctrine\Common\Persistence\Mapping\Driver\MappingDriver
	{
		$service = new Doctrine\ORM\Mapping\Driver\AnnotationDriver($this->getService('annotations.reader'),
			[
			'C:\MAMP\htdocs\Juno\app/AdminModule/Modules/UserModule/model/Entities',
		]);
		return $service;
	}


	public function createServiceDoctrine__default__entityManager(): Kdyby\Doctrine\EntityManager
	{
		$service = Kdyby\Doctrine\EntityManager::create($this->getService('doctrine.default.connection'),
			$this->getService('doctrine.default.ormConfiguration'), $this->getService('doctrine.default.evm'));
		if (!$service instanceof Kdyby\Doctrine\EntityManager) {
			throw new Nette\UnexpectedValueException('Unable to create service \'doctrine.default.entityManager\', value returned by factory is not Kdyby\Doctrine\EntityManager type.');
		}
		$this->getService('doctrine.default.diagnosticsPanel')->bindEntityManager($service);
		$service->onDaoCreate = $this->getService('events.manager')->createEvent(['Kdyby\Doctrine\EntityManager', 'onDaoCreate'],
			$service->onDaoCreate, null, false);
		return $service;
	}


	public function createServiceDoctrine__default__evm(): Kdyby\Events\NamespacedEventManager
	{
		$service = new Kdyby\Events\NamespacedEventManager('Doctrine\ORM\Events::', $this->getService('events.manager'));
		$service->dispatchGlobalEvents = true;
		return $service;
	}


	public function createServiceDoctrine__default__metadataDriver(): Doctrine\Common\Persistence\Mapping\Driver\MappingDriverChain
	{
		$service = new Doctrine\Common\Persistence\Mapping\Driver\MappingDriverChain;
		$service->addDriver($this->getService('doctrine.default.driver.UserModule.annotationsImpl'),
			'UserModule');
		$service->addDriver($this->getService('doctrine.default.driver.SettingsModule.annotationsImpl'),
			'SettingsModule');
		$service->addDriver($this->getService('doctrine.default.driver.ProjectModule.annotationsImpl'),
			'ProjectModule');
		$service->addDriver($this->getService('doctrine.default.driver.ProfileModule.annotationsImpl'),
			'ProfileModule');
		$service->addDriver($this->getService('doctrine.default.driver.MultimediaModule.annotationsImpl'),
			'MultimediaModule');
		$service->addDriver($this->getService('doctrine.default.driver.MailerModule.annotationsImpl'),
			'MailerModule');
		$service->addDriver($this->getService('doctrine.default.driver.LogModule.annotationsImpl'),
			'LogModule');
		$service->addDriver($this->getService('doctrine.default.driver.HomepageModule.annotationsImpl'),
			'HomepageModule');
		$service->addDriver($this->getService('doctrine.default.driver.HelpModule.annotationsImpl'),
			'HelpModule');
		$service->addDriver($this->getService('doctrine.default.driver.DefaultModule.annotationsImpl'),
			'DefaultModule');
		$service->addDriver($this->getService('doctrine.default.driver.ClientModule.annotationsImpl'),
			'ClientModule');
		$service->addDriver($this->getService('doctrine.default.driver.AuthorizatorModule.annotationsImpl'),
			'AuthorizatorModule');
		$service->addDriver($this->getService('doctrine.default.driver.App.annotationsImpl'),
			'App');
		$service->addDriver($this->getService('doctrine.default.driver.Kdyby_Doctrine.annotationsImpl'),
			'Kdyby\Doctrine');
		return $service;
	}


	public function createServiceDoctrine__default__ormConfiguration(): Kdyby\Doctrine\Configuration
	{
		$service = new Kdyby\Doctrine\Configuration;
		$service->setMetadataCacheImpl($this->getService('doctrine.cache.default.metadata'));
		$service->setQueryCacheImpl($this->getService('doctrine.cache.default.query'));
		$service->setResultCacheImpl($this->getService('doctrine.cache.default.ormResult'));
		$service->setHydrationCacheImpl($this->getService('doctrine.cache.default.hydration'));
		$service->setMetadataDriverImpl($this->getService('doctrine.default.metadataDriver'));
		$service->setClassMetadataFactoryName('Kdyby\Doctrine\Mapping\ClassMetadataFactory');
		$service->setDefaultRepositoryClassName('Kdyby\Doctrine\EntityDao');
		$service->setQueryBuilderClassName('Kdyby\Doctrine\QueryBuilder');
		$service->setRepositoryFactory($this->getService('doctrine.default.repositoryFactory'));
		$service->setProxyDir('C:\MAMP\htdocs\Juno\app/../temp/proxies');
		$service->setProxyNamespace('Kdyby\GeneratedProxy');
		$service->setAutoGenerateProxyClasses(1);
		$service->setEntityNamespaces([]);
		$service->setCustomHydrationModes([]);
		$service->setCustomStringFunctions([
			'group_concat' => 'Oro\ORM\Query\AST\Functions\String\GroupConcat',
			'concat_ws' => 'Oro\ORM\Query\AST\Functions\String\ConcatWs',
			'cast' => 'Oro\ORM\Query\AST\Functions\Cast',
		]);
		$service->setCustomNumericFunctions([
			'timestampdiff' => 'Oro\ORM\Query\AST\Functions\Numeric\TimestampDiff',
			'dayofyear' => 'Oro\ORM\Query\AST\Functions\SimpleFunction',
			'dayofmonth' => 'Oro\ORM\Query\AST\Functions\SimpleFunction',
			'dayofweek' => 'Oro\ORM\Query\AST\Functions\SimpleFunction',
			'week' => 'Oro\ORM\Query\AST\Functions\SimpleFunction',
			'day' => 'Oro\ORM\Query\AST\Functions\SimpleFunction',
			'hour' => 'Oro\ORM\Query\AST\Functions\SimpleFunction',
			'minute' => 'Oro\ORM\Query\AST\Functions\SimpleFunction',
			'month' => 'Oro\ORM\Query\AST\Functions\SimpleFunction',
			'quarter' => 'Oro\ORM\Query\AST\Functions\SimpleFunction',
			'second' => 'Oro\ORM\Query\AST\Functions\SimpleFunction',
			'year' => 'Oro\ORM\Query\AST\Functions\SimpleFunction',
			'sign' => 'Oro\ORM\Query\AST\Functions\Numeric\Sign',
			'pow' => 'Oro\ORM\Query\AST\Functions\Numeric\Pow',
		]);
		$service->setCustomDatetimeFunctions([
			'date' => 'Oro\ORM\Query\AST\Functions\SimpleFunction',
			'time' => 'Oro\ORM\Query\AST\Functions\SimpleFunction',
			'timestamp' => 'Oro\ORM\Query\AST\Functions\SimpleFunction',
			'convert_tz' => 'Oro\ORM\Query\AST\Functions\DateTime\ConvertTz',
		]);
		$service->setDefaultQueryHints([]);
		$service->setNamingStrategy(new Doctrine\ORM\Mapping\UnderscoreNamingStrategy);
		$service->setQuoteStrategy(new Doctrine\ORM\Mapping\DefaultQuoteStrategy);
		$service->setEntityListenerResolver(new Kdyby\Doctrine\Mapping\EntityListenerResolver($this));
		return $service;
	}


	public function createServiceDoctrine__default__repositoryFactory(): Kdyby\Doctrine\RepositoryFactory
	{
		$service = new Kdyby\Doctrine\RepositoryFactory($this);
		$service->setServiceIdsMap([], 'doctrine.repositoryFactory.default.defaultRepositoryFactory');
		return $service;
	}


	public function createServiceDoctrine__default__schemaManager(): Doctrine\DBAL\Schema\AbstractSchemaManager
	{
		$service = $this->getService('doctrine.default.connection')->getSchemaManager();
		return $service;
	}


	public function createServiceDoctrine__default__schemaTool(): Doctrine\ORM\Tools\SchemaTool
	{
		$service = new Doctrine\ORM\Tools\SchemaTool($this->getService('doctrine.default.entityManager'));
		return $service;
	}


	public function createServiceDoctrine__default__schemaValidator(): Doctrine\ORM\Tools\SchemaValidator
	{
		$service = new Doctrine\ORM\Tools\SchemaValidator($this->getService('doctrine.default.entityManager'));
		return $service;
	}


	public function createServiceDoctrine__helper__connection(): Doctrine\DBAL\Tools\Console\Helper\ConnectionHelper
	{
		$service = new Doctrine\DBAL\Tools\Console\Helper\ConnectionHelper($this->getService('doctrine.default.connection'));
		return $service;
	}


	public function createServiceDoctrine__helper__entityManager(): Doctrine\ORM\Tools\Console\Helper\EntityManagerHelper
	{
		$service = new Doctrine\ORM\Tools\Console\Helper\EntityManagerHelper($this->getService('doctrine.default.entityManager'));
		return $service;
	}


	public function createServiceDoctrine__registry(): Kdyby\Doctrine\Registry
	{
		$service = new Kdyby\Doctrine\Registry(['default' => 'doctrine.default.connection'],
			['default' => 'doctrine.default.entityManager'], 'default', 'default',
			$this);
		return $service;
	}


	public function createServiceDoctrine__repositoryFactory__default__defaultRepositoryFactory(): Kdyby\Doctrine\DI\IRepositoryFactory
	{
		return new class ($this) implements Kdyby\Doctrine\DI\IRepositoryFactory {
			private $container;


			public function __construct(Container_b2c4047df2 $container)
			{
				$this->container = $container;
			}


			public function create(Doctrine\ORM\EntityManagerInterface $entityManager, Doctrine\ORM\Mapping\ClassMetadata $classMetadata): Kdyby\Doctrine\EntityDao
			{
				$service = new Kdyby\Doctrine\EntityDao($entityManager, $classMetadata);
				return $service;
			}
		};
	}


	public function createServiceEvents__manager(): Kdyby\Events\LazyEventManager
	{
		$service = new Kdyby\Events\LazyEventManager([], $this);
		Kdyby\Events\Diagnostics\Panel::register($service, $this)->renderPanel = true;
		return $service;
	}


	public function createServiceHomepage__ISettingsControlFactory(): HomepageModule\Interfaces\ISettingsControlFactory
	{
		return new class ($this) implements HomepageModule\Interfaces\ISettingsControlFactory {
			private $container;


			public function __construct(Container_b2c4047df2 $container)
			{
				$this->container = $container;
			}


			public function create(): HomepageModule\Controls\SettingsControl
			{
				$service = new HomepageModule\Controls\SettingsControl($this->container->getService('homepage.loginPictureService'),
					$this->container->getService('backend.default.DirService'), $this->container->getService('homepage.loginPictureFormFactory'));
				$service->onAnchor = $this->container->getService('events.manager')->createEvent(['HomepageModule\Controls\SettingsControl', 'onAnchor'],
					$service->onAnchor, null, false);
				return $service;
			}
		};
	}


	public function createServiceHomepage__loginPictureFormFactory(): HomepageModule\Factories\LoginPictureFormFactory
	{
		$service = new HomepageModule\Factories\LoginPictureFormFactory($this->getService('multimedia.multimediaService'),
			$this->getService('multimedia.iMultimediaSaver'), $this->getService('homepage.loginPictureService'),
			$this->getService('log.logService'), $this->getService('backend.default.TranslatedFormFactory'),
			$this->getService('security.user'));
		return $service;
	}


	public function createServiceHomepage__loginPictureRepository(): HomepageModule\Repositories\LoginPictureRepository
	{
		$service = new HomepageModule\Repositories\LoginPictureRepository($this->getService('doctrine.default.entityManager'));
		return $service;
	}


	public function createServiceHomepage__loginPictureService(): HomepageModule\Services\LoginPictureService
	{
		$service = new HomepageModule\Services\LoginPictureService($this->getService('homepage.loginPictureRepository'));
		return $service;
	}


	public function createServiceHttp__context(): Nette\Http\Context
	{
		$service = new Nette\Http\Context($this->getService('http.request'), $this->getService('http.response'));
		trigger_error('Service http.context is deprecated.', 16384);
		return $service;
	}


	public function createServiceHttp__request(): Nette\Http\Request
	{
		$service = $this->getService('http.requestFactory')->createHttpRequest();
		return $service;
	}


	public function createServiceHttp__requestFactory(): Nette\Http\RequestFactory
	{
		$service = new Nette\Http\RequestFactory;
		$service->setProxy([]);
		return $service;
	}


	public function createServiceHttp__response(): Nette\Http\Response
	{
		$service = new Nette\Http\Response;
		return $service;
	}


	public function createServiceLatte__latteFactory(): Nette\Bridges\ApplicationLatte\ILatteFactory
	{
		return new class ($this) implements Nette\Bridges\ApplicationLatte\ILatteFactory {
			private $container;


			public function __construct(Container_b2c4047df2 $container)
			{
				$this->container = $container;
			}


			public function create(): Latte\Engine
			{
				$service = new Latte\Engine;
				$service->setTempDirectory('C:\MAMP\htdocs\Juno\app/../temp/cache/latte');
				$service->setAutoRefresh(true);
				$service->setContentType('xhtml');
				Nette\Utils\Html::$xhtml = true;
				$service->onCompile[] = function ($engine) { FrontModule\Classes\TextMacro::install($engine->getCompiler()); };
				$service->onCompile[] = function ($engine) { Functions\IsAllowedMacro::install($engine->getCompiler()); };
				$service->onCompile[] = function($engine) { Kdyby\Translation\Latte\TranslateMacros::install($engine->getCompiler()); };
				$service->addProvider('translator', $this->container->getService('translation.default'));
				$service->addFilter('translate', [$this->container->getService('translation.helpers'), 'translateFilterAware']);
				$service->onCompile = $this->container->getService('events.manager')->createEvent(['Latte\Engine', 'onCompile'],
					$service->onCompile, null, false);
				WebChemistry\Forms\Controls\Macros\MultiplierMacros::install($service->getCompiler());
				return $service;
			}
		};
	}


	public function createServiceLatte__templateFactory(): Nette\Application\UI\ITemplateFactory
	{
		$service = new Nette\Bridges\ApplicationLatte\TemplateFactory($this->getService('latte.latteFactory'),
			$this->getService('http.request'), $this->getService('security.user'),
			$this->getService('cache.storage'), null);
		return $service;
	}


	public function createServiceLog__logRepository(): LogModule\Repositories\LogRepository
	{
		$service = new LogModule\Repositories\LogRepository($this->getService('doctrine.default.entityManager'));
		return $service;
	}


	public function createServiceLog__logService(): LogModule\Services\LogService
	{
		$service = new LogModule\Services\LogService($this->getService('log.logRepository'),
			$this->getService('http.request'), $this->getService('security.user'));
		return $service;
	}


	public function createServiceMail__mailer(): Nette\Mail\IMailer
	{
		$service = new Nette\Mail\SendmailMailer;
		return $service;
	}


	public function createServiceMailer__ISettingsControlFactory(): MailerModule\Interfaces\ISettingsControlFactory
	{
		return new class ($this) implements MailerModule\Interfaces\ISettingsControlFactory {
			private $container;


			public function __construct(Container_b2c4047df2 $container)
			{
				$this->container = $container;
			}


			public function create(): MailerModule\Controls\SettingsControl
			{
				$service = new MailerModule\Controls\SettingsControl($this->container->getService('mailer.mailerDefaultService'),
					$this->container->getService('mailer.mailerSettingsFormFactory'), $this->container->getService('mailer.mailerDefaultFormFactory'),
					$this->container->getService('backend.default.DirService'));
				$service->onAnchor = $this->container->getService('events.manager')->createEvent(['MailerModule\Controls\SettingsControl', 'onAnchor'],
					$service->onAnchor, null, false);
				return $service;
			}
		};
	}


	public function createServiceMailer__mailerDefaultFormFactory(): MailerModule\Factories\MailerDefaultFormFactory
	{
		$service = new MailerModule\Factories\MailerDefaultFormFactory($this->getService('mailer.mailerDefaultService'),
			$this->getService('backend.default.HydratorService'), $this->getService('log.logService'),
			$this->getService('security.user'), $this->getService('backend.default.TranslatedFormFactory'));
		return $service;
	}


	public function createServiceMailer__mailerDefaultRepository(): MailerModule\Repositories\MailerDefaultRepository
	{
		$service = new MailerModule\Repositories\MailerDefaultRepository($this->getService('doctrine.default.entityManager'));
		return $service;
	}


	public function createServiceMailer__mailerDefaultService(): MailerModule\Services\MailerDefaultService
	{
		$service = new MailerModule\Services\MailerDefaultService($this->getService('mailer.mailerDefaultRepository'));
		return $service;
	}


	public function createServiceMailer__mailerFormFactory(): MailerModule\Factories\MailerFormFactory
	{
		$service = new MailerModule\Factories\MailerFormFactory($this->getService('log.logService'),
			$this->getService('security.user'), $this->getService('backend.default.HydratorService'),
			$this->getService('backend.default.TranslatedFormFactory'), $this->getService('backend.default.MyMailer'),
			$this->getService('settings.settingsService'), $this->getService('mailer.mailerService'),
			$this->getService('multimedia.iMultimediaSaver'));
		return $service;
	}


	public function createServiceMailer__mailerModuleSearch(): MailerModule\Classes\MailerModuleSearch
	{
		$service = new MailerModule\Classes\MailerModuleSearch($this->getService('mailer.mailerService'),
			$this->getService('application.linkGenerator'), $this->getService('latte.templateFactory'));
		return $service;
	}


	public function createServiceMailer__mailerRepository(): MailerModule\Repositories\MailerRepository
	{
		$service = new MailerModule\Repositories\MailerRepository($this->getService('doctrine.default.entityManager'));
		return $service;
	}


	public function createServiceMailer__mailerService(): MailerModule\Services\MailerService
	{
		$service = new MailerModule\Services\MailerService($this->getService('mailer.mailerRepository'));
		return $service;
	}


	public function createServiceMailer__mailerSettingsFormFactory(): MailerModule\Factories\MailerSettingsFormFactory
	{
		$service = new MailerModule\Factories\MailerSettingsFormFactory($this->getService('log.logService'),
			$this->getService('settings.settingsService'), $this->getService('security.user'),
			$this->getService('backend.default.HydratorService'), $this->getService('backend.default.TranslatedFormFactory'));
		return $service;
	}


	public function createServiceMultimedia__iMultimediaSaver(): MultimediaModule\Interfaces\IMultimediaSaver
	{
		return new class ($this) implements MultimediaModule\Interfaces\IMultimediaSaver {
			private $container;


			public function __construct(Container_b2c4047df2 $container)
			{
				$this->container = $container;
			}


			public function create(Nette\Http\FileUpload $fileUpload): MultimediaModule\Services\MultimediaSaver
			{
				$service = new MultimediaModule\Services\MultimediaSaver($fileUpload, $this->container->getService('multimedia.multimediaRepository'),
					$this->container->getService('backend.default.DirService'));
				return $service;
			}
		};
	}


	public function createServiceMultimedia__multimediaFolderRepository(): MultimediaModule\Repositories\Multimedia_folderRepository
	{
		$service = new MultimediaModule\Repositories\Multimedia_folderRepository($this->getService('doctrine.default.entityManager'));
		return $service;
	}


	public function createServiceMultimedia__multimediaFolderService(): MultimediaModule\Services\Multimedia_folderService
	{
		$service = new MultimediaModule\Services\Multimedia_folderService($this->getService('multimedia.multimediaFolderRepository'));
		return $service;
	}


	public function createServiceMultimedia__multimediaRepository(): MultimediaModule\Repositories\MultimediaRepository
	{
		$service = new MultimediaModule\Repositories\MultimediaRepository($this->getService('doctrine.default.entityManager'));
		return $service;
	}


	public function createServiceMultimedia__multimediaService(): MultimediaModule\Services\MultimediaService
	{
		$service = new MultimediaModule\Services\MultimediaService($this->getService('multimedia.multimediaRepository'));
		return $service;
	}


	public function createServiceProfile__ticketFormFactory(): ProfileModule\Factories\TicketFormFactory
	{
		$service = new ProfileModule\Factories\TicketFormFactory($this->getService('log.logService'),
			$this->getService('security.user'), $this->getService('backend.default.HydratorService'),
			$this->getService('backend.default.TranslatedFormFactory'), $this->getService('backend.default.MyMailer'));
		return $service;
	}


	public function createServiceProfile__updateProfileFormFactory(): ProfileModule\Factories\UpdateProfileFormFactory
	{
		$service = new ProfileModule\Factories\UpdateProfileFormFactory($this->getService('backend.default.TranslatedFormFactory'),
			$this->getService('translation.default'), $this->getService('log.logService'),
			$this->getService('user.userService'), $this->getService('multimedia.multimediaService'),
			$this->getService('multimedia.iMultimediaSaver'), $this->getService('security.user'),
			$this->getService('backend.default.HydratorService'));
		return $service;
	}


	public function createServiceProject__IRoleSettingsControlFactory(): ProjectModule\Interfaces\IRoleSettingsControlFactory
	{
		return new class ($this) implements ProjectModule\Interfaces\IRoleSettingsControlFactory {
			private $container;


			public function __construct(Container_b2c4047df2 $container)
			{
				$this->container = $container;
			}


			public function create(): ProjectModule\Controls\RoleSettingsControl
			{
				$service = new ProjectModule\Controls\RoleSettingsControl($this->container->getService('backend.default.SimpleEntityService'),
					$this->container->getService('backend.default.DirService'), $this->container->getService('project.RoleFormFactory'));
				$service->onAnchor = $this->container->getService('events.manager')->createEvent(['ProjectModule\Controls\RoleSettingsControl', 'onAnchor'],
					$service->onAnchor, null, false);
				return $service;
			}
		};
	}


	public function createServiceProject__ImportTestAnalysesFormFactory(): ProjectModule\Factories\ImportTestAnalysesFormFactory
	{
		$service = new ProjectModule\Factories\ImportTestAnalysesFormFactory($this->getService('log.logService'),
			$this->getService('security.user'), $this->getService('backend.default.TranslatedFormFactory'),
			$this->getService('backend.default.SimpleEntityService'));
		return $service;
	}


	public function createServiceProject__IssueCommentFormFactory(): ProjectModule\Factories\IssueCommentFormFactory
	{
		$service = new ProjectModule\Factories\IssueCommentFormFactory($this->getService('log.logService'),
			$this->getService('security.user'), $this->getService('backend.default.HydratorService'),
			$this->getService('backend.default.TranslatedFormFactory'), $this->getService('backend.default.SimpleEntityService'),
			$this->getService('database.default.context'));
		return $service;
	}


	public function createServiceProject__IssueFormFactory(): ProjectModule\Factories\IssueFormFactory
	{
		$service = new ProjectModule\Factories\IssueFormFactory($this->getService('log.logService'),
			$this->getService('security.user'), $this->getService('user.userService'),
			$this->getService('backend.default.HydratorService'), $this->getService('backend.default.TranslatedFormFactory'),
			$this->getService('project.projectService'), $this->getService('backend.default.SimpleEntityService'),
			$this->getService('multimedia.iMultimediaSaver'), $this->getService('database.default.context'));
		return $service;
	}


	public function createServiceProject__ProjectRoleRepository(): ProjectModule\Repositories\ProjectRoleRepository
	{
		$service = new ProjectModule\Repositories\ProjectRoleRepository($this->getService('doctrine.default.entityManager'));
		return $service;
	}


	public function createServiceProject__ProjectRoleService(): ProjectModule\Services\ProjectRoleService
	{
		$service = new ProjectModule\Services\ProjectRoleService($this->getService('project.ProjectRoleRepository'));
		return $service;
	}


	public function createServiceProject__RoleFormFactory(): ProjectModule\Factories\RoleFormFactory
	{
		$service = new ProjectModule\Factories\RoleFormFactory($this->getService('log.logService'),
			$this->getService('security.user'), $this->getService('backend.default.HydratorService'),
			$this->getService('backend.default.TranslatedFormFactory'), $this->getService('backend.default.SimpleEntityService'),
			$this->getService('database.default.context'));
		return $service;
	}


	public function createServiceProject__TagDatesFormFactory(): ProjectModule\Factories\TagDatesFormFactory
	{
		$service = new ProjectModule\Factories\TagDatesFormFactory($this->getService('backend.default.TranslatedFormFactory'),
			$this->getService('project.TagTestCaseService'), $this->getService('project.TestPlanSprintService'));
		return $service;
	}


	public function createServiceProject__TagTestCaseRepository(): ProjectModule\Repositories\TagTestCaseRepository
	{
		$service = new ProjectModule\Repositories\TagTestCaseRepository($this->getService('doctrine.default.entityManager'));
		return $service;
	}


	public function createServiceProject__TagTestCaseService(): ProjectModule\Services\TagTestCaseService
	{
		$service = new ProjectModule\Services\TagTestCaseService($this->getService('project.TagTestCaseRepository'));
		return $service;
	}


	public function createServiceProject__TestCaseRepository(): ProjectModule\Repositories\TestCaseRepository
	{
		$service = new ProjectModule\Repositories\TestCaseRepository($this->getService('doctrine.default.entityManager'));
		return $service;
	}


	public function createServiceProject__TestCaseService(): ProjectModule\Services\TestCaseService
	{
		$service = new ProjectModule\Services\TestCaseService($this->getService('project.TestCaseRepository'),
			$this->getService('backend.default.SimpleEntityService'));
		return $service;
	}


	public function createServiceProject__TestPlanFormFactory(): ProjectModule\Factories\TestPlanFormFactory
	{
		$service = new ProjectModule\Factories\TestPlanFormFactory($this->getService('log.logService'),
			$this->getService('security.user'), $this->getService('backend.default.HydratorService'),
			$this->getService('backend.default.TranslatedFormFactory'), $this->getService('project.TestPlanService'),
			$this->getService('project.TestSetService'), $this->getService('database.default.context'));
		return $service;
	}


	public function createServiceProject__TestPlanRepository(): ProjectModule\Repositories\TestPlanRepository
	{
		$service = new ProjectModule\Repositories\TestPlanRepository($this->getService('doctrine.default.entityManager'));
		return $service;
	}


	public function createServiceProject__TestPlanService(): ProjectModule\Services\TestPlanService
	{
		$service = new ProjectModule\Services\TestPlanService($this->getService('project.TestPlanRepository'));
		return $service;
	}


	public function createServiceProject__TestPlanSprintCaseRepository(): ProjectModule\Repositories\TestPlanSprintCaseRepository
	{
		$service = new ProjectModule\Repositories\TestPlanSprintCaseRepository($this->getService('doctrine.default.entityManager'));
		return $service;
	}


	public function createServiceProject__TestPlanSprintCaseService(): ProjectModule\Services\TestPlanSprintCaseService
	{
		$service = new ProjectModule\Services\TestPlanSprintCaseService($this->getService('project.TestPlanSprintCaseRepository'));
		return $service;
	}


	public function createServiceProject__TestPlanSprintFormFactory(): ProjectModule\Factories\TestPlanSprintFormFactory
	{
		$service = new ProjectModule\Factories\TestPlanSprintFormFactory($this->getService('log.logService'),
			$this->getService('security.user'), $this->getService('backend.default.HydratorService'),
			$this->getService('backend.default.TranslatedFormFactory'), $this->getService('project.TestPlanService'),
			$this->getService('project.TestPlanSprintService'), $this->getService('database.default.context'));
		return $service;
	}


	public function createServiceProject__TestPlanSprintRepository(): ProjectModule\Repositories\TestPlanSprintRepository
	{
		$service = new ProjectModule\Repositories\TestPlanSprintRepository($this->getService('doctrine.default.entityManager'));
		return $service;
	}


	public function createServiceProject__TestPlanSprintRoleFormFactory(): ProjectModule\Factories\TestPlanSprintRoleFormFactory
	{
		$service = new ProjectModule\Factories\TestPlanSprintRoleFormFactory($this->getService('log.logService'),
			$this->getService('security.user'), $this->getService('backend.default.TranslatedFormFactory'),
			$this->getService('database.default.context'));
		return $service;
	}


	public function createServiceProject__TestPlanSprintService(): ProjectModule\Services\TestPlanSprintService
	{
		$service = new ProjectModule\Services\TestPlanSprintService($this->getService('project.TestPlanSprintRepository'));
		return $service;
	}


	public function createServiceProject__TestSetRepository(): ProjectModule\Repositories\TestSetRepository
	{
		$service = new ProjectModule\Repositories\TestSetRepository($this->getService('doctrine.default.entityManager'));
		return $service;
	}


	public function createServiceProject__TestSetService(): ProjectModule\Services\TestSetService
	{
		$service = new ProjectModule\Services\TestSetService($this->getService('project.TestSetRepository'),
			$this->getService('project.TestCaseService'));
		return $service;
	}


	public function createServiceProject__projectFormFactory(): ProjectModule\Factories\ProjectFormFactory
	{
		$service = new ProjectModule\Factories\ProjectFormFactory($this->getService('log.logService'),
			$this->getService('security.user'), $this->getService('backend.default.HydratorService'),
			$this->getService('backend.default.TranslatedFormFactory'), $this->getService('project.projectService'));
		return $service;
	}


	public function createServiceProject__projectRepository(): ProjectModule\Repositories\ProjectRepository
	{
		$service = new ProjectModule\Repositories\ProjectRepository($this->getService('doctrine.default.entityManager'));
		return $service;
	}


	public function createServiceProject__projectService(): ProjectModule\Services\ProjectService
	{
		$service = new ProjectModule\Services\ProjectService($this->getService('project.projectRepository'));
		return $service;
	}


	public function createServiceProject__testCaseFormFactory(): ProjectModule\Factories\TestCaseFormFactory
	{
		$service = new ProjectModule\Factories\TestCaseFormFactory($this->getService('log.logService'),
			$this->getService('security.user'), $this->getService('backend.default.HydratorService'),
			$this->getService('backend.default.TranslatedFormFactory'), $this->getService('project.TestCaseService'),
			$this->getService('multimedia.iMultimediaSaver'), $this->getService('project.TestSetService'),
			$this->getService('multimedia.multimediaService'), $this->getService('backend.default.SimpleEntityService'),
			$this->getService('database.default.context'));
		return $service;
	}


	public function createServiceProject__testSetFormFactory(): ProjectModule\Factories\TestSetFormFactory
	{
		$service = new ProjectModule\Factories\TestSetFormFactory($this->getService('backend.default.SimpleEntityService'),
			$this->getService('log.logService'), $this->getService('security.user'),
			$this->getService('backend.default.HydratorService'), $this->getService('backend.default.TranslatedFormFactory'),
			$this->getService('project.TestSetService'), $this->getService('database.default.context'));
		return $service;
	}


	public function createServiceRouterFactory(): App\RouterFactory
	{
		$service = new App\RouterFactory([
			Nette\PhpGenerator\Helpers::createObject('Nette\Application\Routers\RouteList', [
				"\x00Nette\\Application\\Routers\\RouteList\x00cachedRoutes" => null,
				"\x00Nette\\Application\\Routers\\RouteList\x00module" => 'Admin:Default:',
				"\x00Nette\\Utils\\ArrayList\x00list" => [
					Nette\PhpGenerator\Helpers::createObject('Nette\Application\Routers\Route', [
						"\x00Nette\\Application\\Routers\\Route\x00mask" => '[<locale=sk sk|en>/]admin/default/<presenter>/<action>[/<id>]',
						"\x00Nette\\Application\\Routers\\Route\x00sequence" => [
							'',
							'[',
							'',
							'locale',
							'/',
							']',
							'admin/default/',
							'presenter',
							'/',
							'action',
							'',
							'[',
							'/',
							'id',
							'',
							']',
							'',
						],
						"\x00Nette\\Application\\Routers\\Route\x00re" => '#(?:(?P<p5>(?U)sk|en)/)?admin/default/(?:(?P<p14>(?U)[a-z][a-z0-9.-]*)/(?:(?P<p18>(?U)[a-z][a-z0-9-]*)(?:/(?P<p27>(?U)[^/]+))?)?)?/?\z#A',
						"\x00Nette\\Application\\Routers\\Route\x00aliases" => [
							'p27' => 'id',
							'p18' => 'action',
							'p14' => 'presenter',
							'p5' => 'locale',
						],
						"\x00Nette\\Application\\Routers\\Route\x00metadata" => [
							'presenter' => [
								'value' => 'Default',
								'fixity' => 1,
								'pattern' => '#(?:[a-z][a-z0-9.-]*)\z#A',
								'filterIn' => ['Nette\Application\Routers\Route', 'path2presenter'],
								'filterOut' => ['Nette\Application\Routers\Route', 'presenter2path'],
								'filterTable2' => null,
								'defOut' => 'default',
							],
							'action' => [
								'value' => 'default',
								'fixity' => 1,
								'pattern' => '#(?:[a-z][a-z0-9-]*)\z#A',
								'filterIn' => ['Nette\Application\Routers\Route', 'path2action'],
								'filterOut' => ['Nette\Application\Routers\Route', 'action2path'],
								'filterTable2' => null,
								'defOut' => 'default',
							],
							'id' => [
								'pattern' => '#(?:[^/]+)\z#A',
								'filterOut' => ['Nette\Application\Routers\Route', 'param2path'],
								'filterTable2' => null,
								'defOut' => null,
								'value' => null,
								'fixity' => 1,
							],
							'locale' => [
								'pattern' => '#(?:sk|en)\z#A',
								'filterOut' => ['Nette\Application\Routers\Route', 'param2path'],
								'value' => 'sk',
								'fixity' => 1,
								'filterTable2' => null,
								'defOut' => 'sk',
							],
						],
						"\x00Nette\\Application\\Routers\\Route\x00xlat" => [],
						"\x00Nette\\Application\\Routers\\Route\x00type" => 3,
						"\x00Nette\\Application\\Routers\\Route\x00scheme" => null,
						"\x00Nette\\Application\\Routers\\Route\x00flags" => 0,
						"\x00Nette\\Application\\Routers\\Route\x00lastRefUrl" => null,
						"\x00Nette\\Application\\Routers\\Route\x00lastBaseUrl" => null,
					]),
				],
			]),
			Nette\PhpGenerator\Helpers::createObject('Nette\Application\Routers\RouteList', [
				"\x00Nette\\Application\\Routers\\RouteList\x00cachedRoutes" => null,
				"\x00Nette\\Application\\Routers\\RouteList\x00module" => 'Admin:Default:',
				"\x00Nette\\Utils\\ArrayList\x00list" => [
					Nette\PhpGenerator\Helpers::createObject('Nette\Application\Routers\Route', [
						"\x00Nette\\Application\\Routers\\Route\x00mask" => '[<locale=sk sk|en>/]admin/default/<action>[/<id>]',
						"\x00Nette\\Application\\Routers\\Route\x00sequence" => [
							'',
							'[',
							'',
							'locale',
							'/',
							']',
							'admin/default/',
							'action',
							'',
							'[',
							'/',
							'id',
							'',
							']',
							'',
						],
						"\x00Nette\\Application\\Routers\\Route\x00re" => '#(?:(?P<p5>(?U)sk|en)/)?admin/default/(?:(?P<p14>(?U)[a-z][a-z0-9-]*)(?:/(?P<p23>(?U)[^/]+))?)?/?\z#A',
						"\x00Nette\\Application\\Routers\\Route\x00aliases" => ['p23' => 'id', 'p14' => 'action', 'p5' => 'locale'],
						"\x00Nette\\Application\\Routers\\Route\x00metadata" => [
							'presenter' => ['value' => 'Default', 'fixity' => 2],
							'action' => [
								'value' => 'default',
								'fixity' => 1,
								'pattern' => '#(?:[a-z][a-z0-9-]*)\z#A',
								'filterIn' => ['Nette\Application\Routers\Route', 'path2action'],
								'filterOut' => ['Nette\Application\Routers\Route', 'action2path'],
								'filterTable2' => null,
								'defOut' => 'default',
							],
							'id' => [
								'pattern' => '#(?:[^/]+)\z#A',
								'filterOut' => ['Nette\Application\Routers\Route', 'param2path'],
								'filterTable2' => null,
								'defOut' => null,
								'value' => null,
								'fixity' => 1,
							],
							'locale' => [
								'pattern' => '#(?:sk|en)\z#A',
								'filterOut' => ['Nette\Application\Routers\Route', 'param2path'],
								'value' => 'sk',
								'fixity' => 1,
								'filterTable2' => null,
								'defOut' => 'sk',
							],
						],
						"\x00Nette\\Application\\Routers\\Route\x00xlat" => [],
						"\x00Nette\\Application\\Routers\\Route\x00type" => 3,
						"\x00Nette\\Application\\Routers\\Route\x00scheme" => null,
						"\x00Nette\\Application\\Routers\\Route\x00flags" => 0,
						"\x00Nette\\Application\\Routers\\Route\x00lastRefUrl" => null,
						"\x00Nette\\Application\\Routers\\Route\x00lastBaseUrl" => null,
					]),
				],
			]),
			Nette\PhpGenerator\Helpers::createObject('Nette\Application\Routers\RouteList', [
				"\x00Nette\\Application\\Routers\\RouteList\x00cachedRoutes" => null,
				"\x00Nette\\Application\\Routers\\RouteList\x00module" => 'Admin:Project:',
				"\x00Nette\\Utils\\ArrayList\x00list" => [
					Nette\PhpGenerator\Helpers::createObject('Nette\Application\Routers\Route', [
						"\x00Nette\\Application\\Routers\\Route\x00mask" => '[<locale=sk sk|en>/]admin/project/<presenter>/<action>/<projectID>/<testSprintID>',
						"\x00Nette\\Application\\Routers\\Route\x00sequence" => [
							'',
							'[',
							'',
							'locale',
							'/',
							']',
							'admin/project/',
							'presenter',
							'/',
							'action',
							'/',
							'projectID',
							'/',
							'testSprintID',
							'',
						],
						"\x00Nette\\Application\\Routers\\Route\x00re" => '#(?:(?P<p5>(?U)sk|en)/)?admin/project/(?P<p14>(?U)[a-z][a-z0-9.-]*)/(?P<p18>(?U)[a-z][a-z0-9-]*)/(?P<p22>(?U)[^/]+)/(?P<p26>(?U)[^/]+)/?\z#A',
						"\x00Nette\\Application\\Routers\\Route\x00aliases" => [
							'p26' => 'testSprintID',
							'p22' => 'projectID',
							'p18' => 'action',
							'p14' => 'presenter',
							'p5' => 'locale',
						],
						"\x00Nette\\Application\\Routers\\Route\x00metadata" => [
							'presenter' => [
								'value' => 'TestExecution',
								'fixity' => 1,
								'pattern' => '#(?:[a-z][a-z0-9.-]*)\z#A',
								'filterIn' => ['Nette\Application\Routers\Route', 'path2presenter'],
								'filterOut' => ['Nette\Application\Routers\Route', 'presenter2path'],
								'filterTable2' => null,
								'defOut' => 'test-execution',
							],
							'action' => [
								'value' => 'testSprint',
								'fixity' => 1,
								'pattern' => '#(?:[a-z][a-z0-9-]*)\z#A',
								'filterIn' => ['Nette\Application\Routers\Route', 'path2action'],
								'filterOut' => ['Nette\Application\Routers\Route', 'action2path'],
								'filterTable2' => null,
								'defOut' => 'test-sprint',
							],
							'testSprintID' => [
								'pattern' => '#(?:[^/]+)\z#A',
								'filterOut' => ['Nette\Application\Routers\Route', 'param2path'],
								'filterTable2' => null,
							],
							'projectID' => [
								'pattern' => '#(?:[^/]+)\z#A',
								'filterOut' => ['Nette\Application\Routers\Route', 'param2path'],
								'filterTable2' => null,
							],
							'locale' => [
								'pattern' => '#(?:sk|en)\z#A',
								'filterOut' => ['Nette\Application\Routers\Route', 'param2path'],
								'value' => 'sk',
								'fixity' => 1,
								'filterTable2' => null,
								'defOut' => 'sk',
							],
						],
						"\x00Nette\\Application\\Routers\\Route\x00xlat" => [],
						"\x00Nette\\Application\\Routers\\Route\x00type" => 3,
						"\x00Nette\\Application\\Routers\\Route\x00scheme" => null,
						"\x00Nette\\Application\\Routers\\Route\x00flags" => 0,
						"\x00Nette\\Application\\Routers\\Route\x00lastRefUrl" => null,
						"\x00Nette\\Application\\Routers\\Route\x00lastBaseUrl" => null,
					]),
				],
			]),
			Nette\PhpGenerator\Helpers::createObject('Nette\Application\Routers\RouteList', [
				"\x00Nette\\Application\\Routers\\RouteList\x00cachedRoutes" => null,
				"\x00Nette\\Application\\Routers\\RouteList\x00module" => 'Admin:Project:',
				"\x00Nette\\Utils\\ArrayList\x00list" => [
					Nette\PhpGenerator\Helpers::createObject('Nette\Application\Routers\Route', [
						"\x00Nette\\Application\\Routers\\Route\x00mask" => '[<locale=sk sk|en>/]admin/project/<presenter>/<action>/<projectID>',
						"\x00Nette\\Application\\Routers\\Route\x00sequence" => [
							'',
							'[',
							'',
							'locale',
							'/',
							']',
							'admin/project/',
							'presenter',
							'/',
							'action',
							'/',
							'projectID',
							'',
						],
						"\x00Nette\\Application\\Routers\\Route\x00re" => '#(?:(?P<p5>(?U)sk|en)/)?admin/project/(?P<p14>(?U)[a-z][a-z0-9.-]*)/(?P<p18>(?U)[a-z][a-z0-9-]*)/(?P<p22>(?U)[^/]+)/?\z#A',
						"\x00Nette\\Application\\Routers\\Route\x00aliases" => [
							'p22' => 'projectID',
							'p18' => 'action',
							'p14' => 'presenter',
							'p5' => 'locale',
						],
						"\x00Nette\\Application\\Routers\\Route\x00metadata" => [
							'presenter' => [
								'value' => 'Dashboard',
								'fixity' => 1,
								'pattern' => '#(?:[a-z][a-z0-9.-]*)\z#A',
								'filterIn' => ['Nette\Application\Routers\Route', 'path2presenter'],
								'filterOut' => ['Nette\Application\Routers\Route', 'presenter2path'],
								'filterTable2' => null,
								'defOut' => 'dashboard',
							],
							'action' => [
								'value' => 'default',
								'fixity' => 1,
								'pattern' => '#(?:[a-z][a-z0-9-]*)\z#A',
								'filterIn' => ['Nette\Application\Routers\Route', 'path2action'],
								'filterOut' => ['Nette\Application\Routers\Route', 'action2path'],
								'filterTable2' => null,
								'defOut' => 'default',
							],
							'projectID' => [
								'pattern' => '#(?:[^/]+)\z#A',
								'filterOut' => ['Nette\Application\Routers\Route', 'param2path'],
								'filterTable2' => null,
							],
							'locale' => [
								'pattern' => '#(?:sk|en)\z#A',
								'filterOut' => ['Nette\Application\Routers\Route', 'param2path'],
								'value' => 'sk',
								'fixity' => 1,
								'filterTable2' => null,
								'defOut' => 'sk',
							],
						],
						"\x00Nette\\Application\\Routers\\Route\x00xlat" => [],
						"\x00Nette\\Application\\Routers\\Route\x00type" => 3,
						"\x00Nette\\Application\\Routers\\Route\x00scheme" => null,
						"\x00Nette\\Application\\Routers\\Route\x00flags" => 0,
						"\x00Nette\\Application\\Routers\\Route\x00lastRefUrl" => null,
						"\x00Nette\\Application\\Routers\\Route\x00lastBaseUrl" => null,
					]),
				],
			]),
			Nette\PhpGenerator\Helpers::createObject('Nette\Application\Routers\RouteList', [
				"\x00Nette\\Application\\Routers\\RouteList\x00cachedRoutes" => null,
				"\x00Nette\\Application\\Routers\\RouteList\x00module" => 'Admin:Project:',
				"\x00Nette\\Utils\\ArrayList\x00list" => [
					Nette\PhpGenerator\Helpers::createObject('Nette\Application\Routers\Route', [
						"\x00Nette\\Application\\Routers\\Route\x00mask" => '[<locale=sk sk|en>/]admin/project/<presenter>/<action>[/<id>]',
						"\x00Nette\\Application\\Routers\\Route\x00sequence" => [
							'',
							'[',
							'',
							'locale',
							'/',
							']',
							'admin/project/',
							'presenter',
							'/',
							'action',
							'',
							'[',
							'/',
							'id',
							'',
							']',
							'',
						],
						"\x00Nette\\Application\\Routers\\Route\x00re" => '#(?:(?P<p5>(?U)sk|en)/)?admin/project/(?:(?P<p14>(?U)[a-z][a-z0-9.-]*)/(?:(?P<p18>(?U)[a-z][a-z0-9-]*)(?:/(?P<p27>(?U)[^/]+))?)?)?/?\z#A',
						"\x00Nette\\Application\\Routers\\Route\x00aliases" => [
							'p27' => 'id',
							'p18' => 'action',
							'p14' => 'presenter',
							'p5' => 'locale',
						],
						"\x00Nette\\Application\\Routers\\Route\x00metadata" => [
							'presenter' => [
								'value' => 'Project',
								'fixity' => 1,
								'pattern' => '#(?:[a-z][a-z0-9.-]*)\z#A',
								'filterIn' => ['Nette\Application\Routers\Route', 'path2presenter'],
								'filterOut' => ['Nette\Application\Routers\Route', 'presenter2path'],
								'filterTable2' => null,
								'defOut' => 'project',
							],
							'action' => [
								'value' => 'default',
								'fixity' => 1,
								'pattern' => '#(?:[a-z][a-z0-9-]*)\z#A',
								'filterIn' => ['Nette\Application\Routers\Route', 'path2action'],
								'filterOut' => ['Nette\Application\Routers\Route', 'action2path'],
								'filterTable2' => null,
								'defOut' => 'default',
							],
							'id' => [
								'pattern' => '#(?:[^/]+)\z#A',
								'filterOut' => ['Nette\Application\Routers\Route', 'param2path'],
								'filterTable2' => null,
								'defOut' => null,
								'value' => null,
								'fixity' => 1,
							],
							'locale' => [
								'pattern' => '#(?:sk|en)\z#A',
								'filterOut' => ['Nette\Application\Routers\Route', 'param2path'],
								'value' => 'sk',
								'fixity' => 1,
								'filterTable2' => null,
								'defOut' => 'sk',
							],
						],
						"\x00Nette\\Application\\Routers\\Route\x00xlat" => [],
						"\x00Nette\\Application\\Routers\\Route\x00type" => 3,
						"\x00Nette\\Application\\Routers\\Route\x00scheme" => null,
						"\x00Nette\\Application\\Routers\\Route\x00flags" => 0,
						"\x00Nette\\Application\\Routers\\Route\x00lastRefUrl" => null,
						"\x00Nette\\Application\\Routers\\Route\x00lastBaseUrl" => null,
					]),
				],
			]),
			Nette\PhpGenerator\Helpers::createObject('Nette\Application\Routers\RouteList', [
				"\x00Nette\\Application\\Routers\\RouteList\x00cachedRoutes" => null,
				"\x00Nette\\Application\\Routers\\RouteList\x00module" => 'Admin:Project:',
				"\x00Nette\\Utils\\ArrayList\x00list" => [
					Nette\PhpGenerator\Helpers::createObject('Nette\Application\Routers\Route', [
						"\x00Nette\\Application\\Routers\\Route\x00mask" => '[<locale=sk sk|en>/]admin/project/<action>[/<id>]',
						"\x00Nette\\Application\\Routers\\Route\x00sequence" => [
							'',
							'[',
							'',
							'locale',
							'/',
							']',
							'admin/project/',
							'action',
							'',
							'[',
							'/',
							'id',
							'',
							']',
							'',
						],
						"\x00Nette\\Application\\Routers\\Route\x00re" => '#(?:(?P<p5>(?U)sk|en)/)?admin/project/(?:(?P<p14>(?U)[a-z][a-z0-9-]*)(?:/(?P<p23>(?U)[^/]+))?)?/?\z#A',
						"\x00Nette\\Application\\Routers\\Route\x00aliases" => ['p23' => 'id', 'p14' => 'action', 'p5' => 'locale'],
						"\x00Nette\\Application\\Routers\\Route\x00metadata" => [
							'presenter' => ['value' => 'Project', 'fixity' => 2],
							'action' => [
								'value' => 'default',
								'fixity' => 1,
								'pattern' => '#(?:[a-z][a-z0-9-]*)\z#A',
								'filterIn' => ['Nette\Application\Routers\Route', 'path2action'],
								'filterOut' => ['Nette\Application\Routers\Route', 'action2path'],
								'filterTable2' => null,
								'defOut' => 'default',
							],
							'id' => [
								'pattern' => '#(?:[^/]+)\z#A',
								'filterOut' => ['Nette\Application\Routers\Route', 'param2path'],
								'filterTable2' => null,
								'defOut' => null,
								'value' => null,
								'fixity' => 1,
							],
							'locale' => [
								'pattern' => '#(?:sk|en)\z#A',
								'filterOut' => ['Nette\Application\Routers\Route', 'param2path'],
								'value' => 'sk',
								'fixity' => 1,
								'filterTable2' => null,
								'defOut' => 'sk',
							],
						],
						"\x00Nette\\Application\\Routers\\Route\x00xlat" => [],
						"\x00Nette\\Application\\Routers\\Route\x00type" => 3,
						"\x00Nette\\Application\\Routers\\Route\x00scheme" => null,
						"\x00Nette\\Application\\Routers\\Route\x00flags" => 0,
						"\x00Nette\\Application\\Routers\\Route\x00lastRefUrl" => null,
						"\x00Nette\\Application\\Routers\\Route\x00lastBaseUrl" => null,
					]),
				],
			]),
			Nette\PhpGenerator\Helpers::createObject('Nette\Application\Routers\RouteList', [
				"\x00Nette\\Application\\Routers\\RouteList\x00cachedRoutes" => null,
				"\x00Nette\\Application\\Routers\\RouteList\x00module" => 'Admin:Log:',
				"\x00Nette\\Utils\\ArrayList\x00list" => [
					Nette\PhpGenerator\Helpers::createObject('Nette\Application\Routers\Route', [
						"\x00Nette\\Application\\Routers\\Route\x00mask" => '[<locale=sk sk|en>/]admin/log/<presenter>/<action>[/<id>]',
						"\x00Nette\\Application\\Routers\\Route\x00sequence" => [
							'',
							'[',
							'',
							'locale',
							'/',
							']',
							'admin/log/',
							'presenter',
							'/',
							'action',
							'',
							'[',
							'/',
							'id',
							'',
							']',
							'',
						],
						"\x00Nette\\Application\\Routers\\Route\x00re" => '#(?:(?P<p5>(?U)sk|en)/)?admin/log/(?:(?P<p14>(?U)[a-z][a-z0-9.-]*)/(?:(?P<p18>(?U)[a-z][a-z0-9-]*)(?:/(?P<p27>(?U)[^/]+))?)?)?/?\z#A',
						"\x00Nette\\Application\\Routers\\Route\x00aliases" => [
							'p27' => 'id',
							'p18' => 'action',
							'p14' => 'presenter',
							'p5' => 'locale',
						],
						"\x00Nette\\Application\\Routers\\Route\x00metadata" => [
							'presenter' => [
								'value' => 'Log',
								'fixity' => 1,
								'pattern' => '#(?:[a-z][a-z0-9.-]*)\z#A',
								'filterIn' => ['Nette\Application\Routers\Route', 'path2presenter'],
								'filterOut' => ['Nette\Application\Routers\Route', 'presenter2path'],
								'filterTable2' => null,
								'defOut' => 'log',
							],
							'action' => [
								'value' => 'default',
								'fixity' => 1,
								'pattern' => '#(?:[a-z][a-z0-9-]*)\z#A',
								'filterIn' => ['Nette\Application\Routers\Route', 'path2action'],
								'filterOut' => ['Nette\Application\Routers\Route', 'action2path'],
								'filterTable2' => null,
								'defOut' => 'default',
							],
							'id' => [
								'pattern' => '#(?:[^/]+)\z#A',
								'filterOut' => ['Nette\Application\Routers\Route', 'param2path'],
								'filterTable2' => null,
								'defOut' => null,
								'value' => null,
								'fixity' => 1,
							],
							'locale' => [
								'pattern' => '#(?:sk|en)\z#A',
								'filterOut' => ['Nette\Application\Routers\Route', 'param2path'],
								'value' => 'sk',
								'fixity' => 1,
								'filterTable2' => null,
								'defOut' => 'sk',
							],
						],
						"\x00Nette\\Application\\Routers\\Route\x00xlat" => [],
						"\x00Nette\\Application\\Routers\\Route\x00type" => 3,
						"\x00Nette\\Application\\Routers\\Route\x00scheme" => null,
						"\x00Nette\\Application\\Routers\\Route\x00flags" => 0,
						"\x00Nette\\Application\\Routers\\Route\x00lastRefUrl" => null,
						"\x00Nette\\Application\\Routers\\Route\x00lastBaseUrl" => null,
					]),
				],
			]),
			Nette\PhpGenerator\Helpers::createObject('Nette\Application\Routers\RouteList', [
				"\x00Nette\\Application\\Routers\\RouteList\x00cachedRoutes" => null,
				"\x00Nette\\Application\\Routers\\RouteList\x00module" => 'Admin:Log:',
				"\x00Nette\\Utils\\ArrayList\x00list" => [
					Nette\PhpGenerator\Helpers::createObject('Nette\Application\Routers\Route', [
						"\x00Nette\\Application\\Routers\\Route\x00mask" => '[<locale=sk sk|en>/]admin/log/<action>[/<id>]',
						"\x00Nette\\Application\\Routers\\Route\x00sequence" => [
							'',
							'[',
							'',
							'locale',
							'/',
							']',
							'admin/log/',
							'action',
							'',
							'[',
							'/',
							'id',
							'',
							']',
							'',
						],
						"\x00Nette\\Application\\Routers\\Route\x00re" => '#(?:(?P<p5>(?U)sk|en)/)?admin/log/(?:(?P<p14>(?U)[a-z][a-z0-9-]*)(?:/(?P<p23>(?U)[^/]+))?)?/?\z#A',
						"\x00Nette\\Application\\Routers\\Route\x00aliases" => ['p23' => 'id', 'p14' => 'action', 'p5' => 'locale'],
						"\x00Nette\\Application\\Routers\\Route\x00metadata" => [
							'presenter' => ['value' => 'Log', 'fixity' => 2],
							'action' => [
								'value' => 'default',
								'fixity' => 1,
								'pattern' => '#(?:[a-z][a-z0-9-]*)\z#A',
								'filterIn' => ['Nette\Application\Routers\Route', 'path2action'],
								'filterOut' => ['Nette\Application\Routers\Route', 'action2path'],
								'filterTable2' => null,
								'defOut' => 'default',
							],
							'id' => [
								'pattern' => '#(?:[^/]+)\z#A',
								'filterOut' => ['Nette\Application\Routers\Route', 'param2path'],
								'filterTable2' => null,
								'defOut' => null,
								'value' => null,
								'fixity' => 1,
							],
							'locale' => [
								'pattern' => '#(?:sk|en)\z#A',
								'filterOut' => ['Nette\Application\Routers\Route', 'param2path'],
								'value' => 'sk',
								'fixity' => 1,
								'filterTable2' => null,
								'defOut' => 'sk',
							],
						],
						"\x00Nette\\Application\\Routers\\Route\x00xlat" => [],
						"\x00Nette\\Application\\Routers\\Route\x00type" => 3,
						"\x00Nette\\Application\\Routers\\Route\x00scheme" => null,
						"\x00Nette\\Application\\Routers\\Route\x00flags" => 0,
						"\x00Nette\\Application\\Routers\\Route\x00lastRefUrl" => null,
						"\x00Nette\\Application\\Routers\\Route\x00lastBaseUrl" => null,
					]),
				],
			]),
			Nette\PhpGenerator\Helpers::createObject('Nette\Application\Routers\RouteList', [
				"\x00Nette\\Application\\Routers\\RouteList\x00cachedRoutes" => null,
				"\x00Nette\\Application\\Routers\\RouteList\x00module" => 'Admin:User:',
				"\x00Nette\\Utils\\ArrayList\x00list" => [
					Nette\PhpGenerator\Helpers::createObject('Nette\Application\Routers\Route', [
						"\x00Nette\\Application\\Routers\\Route\x00mask" => '[<locale=sk sk|en>/]admin/user/<presenter>/<action>[/<id>]',
						"\x00Nette\\Application\\Routers\\Route\x00sequence" => [
							'',
							'[',
							'',
							'locale',
							'/',
							']',
							'admin/user/',
							'presenter',
							'/',
							'action',
							'',
							'[',
							'/',
							'id',
							'',
							']',
							'',
						],
						"\x00Nette\\Application\\Routers\\Route\x00re" => '#(?:(?P<p5>(?U)sk|en)/)?admin/user/(?:(?P<p14>(?U)[a-z][a-z0-9.-]*)/(?:(?P<p18>(?U)[a-z][a-z0-9-]*)(?:/(?P<p27>(?U)[^/]+))?)?)?/?\z#A',
						"\x00Nette\\Application\\Routers\\Route\x00aliases" => [
							'p27' => 'id',
							'p18' => 'action',
							'p14' => 'presenter',
							'p5' => 'locale',
						],
						"\x00Nette\\Application\\Routers\\Route\x00metadata" => [
							'presenter' => [
								'value' => 'User',
								'fixity' => 1,
								'pattern' => '#(?:[a-z][a-z0-9.-]*)\z#A',
								'filterIn' => ['Nette\Application\Routers\Route', 'path2presenter'],
								'filterOut' => ['Nette\Application\Routers\Route', 'presenter2path'],
								'filterTable2' => null,
								'defOut' => 'user',
							],
							'action' => [
								'value' => 'default',
								'fixity' => 1,
								'pattern' => '#(?:[a-z][a-z0-9-]*)\z#A',
								'filterIn' => ['Nette\Application\Routers\Route', 'path2action'],
								'filterOut' => ['Nette\Application\Routers\Route', 'action2path'],
								'filterTable2' => null,
								'defOut' => 'default',
							],
							'id' => [
								'pattern' => '#(?:[^/]+)\z#A',
								'filterOut' => ['Nette\Application\Routers\Route', 'param2path'],
								'filterTable2' => null,
								'defOut' => null,
								'value' => null,
								'fixity' => 1,
							],
							'locale' => [
								'pattern' => '#(?:sk|en)\z#A',
								'filterOut' => ['Nette\Application\Routers\Route', 'param2path'],
								'value' => 'sk',
								'fixity' => 1,
								'filterTable2' => null,
								'defOut' => 'sk',
							],
						],
						"\x00Nette\\Application\\Routers\\Route\x00xlat" => [],
						"\x00Nette\\Application\\Routers\\Route\x00type" => 3,
						"\x00Nette\\Application\\Routers\\Route\x00scheme" => null,
						"\x00Nette\\Application\\Routers\\Route\x00flags" => 0,
						"\x00Nette\\Application\\Routers\\Route\x00lastRefUrl" => null,
						"\x00Nette\\Application\\Routers\\Route\x00lastBaseUrl" => null,
					]),
				],
			]),
			Nette\PhpGenerator\Helpers::createObject('Nette\Application\Routers\RouteList', [
				"\x00Nette\\Application\\Routers\\RouteList\x00cachedRoutes" => null,
				"\x00Nette\\Application\\Routers\\RouteList\x00module" => 'Admin:User:',
				"\x00Nette\\Utils\\ArrayList\x00list" => [
					Nette\PhpGenerator\Helpers::createObject('Nette\Application\Routers\Route', [
						"\x00Nette\\Application\\Routers\\Route\x00mask" => '[<locale=sk sk|en>/]admin/user/<action>[/<id>]',
						"\x00Nette\\Application\\Routers\\Route\x00sequence" => [
							'',
							'[',
							'',
							'locale',
							'/',
							']',
							'admin/user/',
							'action',
							'',
							'[',
							'/',
							'id',
							'',
							']',
							'',
						],
						"\x00Nette\\Application\\Routers\\Route\x00re" => '#(?:(?P<p5>(?U)sk|en)/)?admin/user/(?:(?P<p14>(?U)[a-z][a-z0-9-]*)(?:/(?P<p23>(?U)[^/]+))?)?/?\z#A',
						"\x00Nette\\Application\\Routers\\Route\x00aliases" => ['p23' => 'id', 'p14' => 'action', 'p5' => 'locale'],
						"\x00Nette\\Application\\Routers\\Route\x00metadata" => [
							'presenter' => ['value' => 'User', 'fixity' => 2],
							'action' => [
								'value' => 'default',
								'fixity' => 1,
								'pattern' => '#(?:[a-z][a-z0-9-]*)\z#A',
								'filterIn' => ['Nette\Application\Routers\Route', 'path2action'],
								'filterOut' => ['Nette\Application\Routers\Route', 'action2path'],
								'filterTable2' => null,
								'defOut' => 'default',
							],
							'id' => [
								'pattern' => '#(?:[^/]+)\z#A',
								'filterOut' => ['Nette\Application\Routers\Route', 'param2path'],
								'filterTable2' => null,
								'defOut' => null,
								'value' => null,
								'fixity' => 1,
							],
							'locale' => [
								'pattern' => '#(?:sk|en)\z#A',
								'filterOut' => ['Nette\Application\Routers\Route', 'param2path'],
								'value' => 'sk',
								'fixity' => 1,
								'filterTable2' => null,
								'defOut' => 'sk',
							],
						],
						"\x00Nette\\Application\\Routers\\Route\x00xlat" => [],
						"\x00Nette\\Application\\Routers\\Route\x00type" => 3,
						"\x00Nette\\Application\\Routers\\Route\x00scheme" => null,
						"\x00Nette\\Application\\Routers\\Route\x00flags" => 0,
						"\x00Nette\\Application\\Routers\\Route\x00lastRefUrl" => null,
						"\x00Nette\\Application\\Routers\\Route\x00lastBaseUrl" => null,
					]),
				],
			]),
			Nette\PhpGenerator\Helpers::createObject('Nette\Application\Routers\RouteList', [
				"\x00Nette\\Application\\Routers\\RouteList\x00cachedRoutes" => null,
				"\x00Nette\\Application\\Routers\\RouteList\x00module" => 'Admin:Client:',
				"\x00Nette\\Utils\\ArrayList\x00list" => [
					Nette\PhpGenerator\Helpers::createObject('Nette\Application\Routers\Route', [
						"\x00Nette\\Application\\Routers\\Route\x00mask" => '[<locale=sk sk|en>/]admin/client/<presenter>/<action>[/<id>]',
						"\x00Nette\\Application\\Routers\\Route\x00sequence" => [
							'',
							'[',
							'',
							'locale',
							'/',
							']',
							'admin/client/',
							'presenter',
							'/',
							'action',
							'',
							'[',
							'/',
							'id',
							'',
							']',
							'',
						],
						"\x00Nette\\Application\\Routers\\Route\x00re" => '#(?:(?P<p5>(?U)sk|en)/)?admin/client/(?:(?P<p14>(?U)[a-z][a-z0-9.-]*)/(?:(?P<p18>(?U)[a-z][a-z0-9-]*)(?:/(?P<p27>(?U)[^/]+))?)?)?/?\z#A',
						"\x00Nette\\Application\\Routers\\Route\x00aliases" => [
							'p27' => 'id',
							'p18' => 'action',
							'p14' => 'presenter',
							'p5' => 'locale',
						],
						"\x00Nette\\Application\\Routers\\Route\x00metadata" => [
							'presenter' => [
								'value' => 'Client',
								'fixity' => 1,
								'pattern' => '#(?:[a-z][a-z0-9.-]*)\z#A',
								'filterIn' => ['Nette\Application\Routers\Route', 'path2presenter'],
								'filterOut' => ['Nette\Application\Routers\Route', 'presenter2path'],
								'filterTable2' => null,
								'defOut' => 'client',
							],
							'action' => [
								'value' => 'default',
								'fixity' => 1,
								'pattern' => '#(?:[a-z][a-z0-9-]*)\z#A',
								'filterIn' => ['Nette\Application\Routers\Route', 'path2action'],
								'filterOut' => ['Nette\Application\Routers\Route', 'action2path'],
								'filterTable2' => null,
								'defOut' => 'default',
							],
							'id' => [
								'pattern' => '#(?:[^/]+)\z#A',
								'filterOut' => ['Nette\Application\Routers\Route', 'param2path'],
								'filterTable2' => null,
								'defOut' => null,
								'value' => null,
								'fixity' => 1,
							],
							'locale' => [
								'pattern' => '#(?:sk|en)\z#A',
								'filterOut' => ['Nette\Application\Routers\Route', 'param2path'],
								'value' => 'sk',
								'fixity' => 1,
								'filterTable2' => null,
								'defOut' => 'sk',
							],
						],
						"\x00Nette\\Application\\Routers\\Route\x00xlat" => [],
						"\x00Nette\\Application\\Routers\\Route\x00type" => 3,
						"\x00Nette\\Application\\Routers\\Route\x00scheme" => null,
						"\x00Nette\\Application\\Routers\\Route\x00flags" => 0,
						"\x00Nette\\Application\\Routers\\Route\x00lastRefUrl" => null,
						"\x00Nette\\Application\\Routers\\Route\x00lastBaseUrl" => null,
					]),
				],
			]),
			Nette\PhpGenerator\Helpers::createObject('Nette\Application\Routers\RouteList', [
				"\x00Nette\\Application\\Routers\\RouteList\x00cachedRoutes" => null,
				"\x00Nette\\Application\\Routers\\RouteList\x00module" => 'Admin:Client:',
				"\x00Nette\\Utils\\ArrayList\x00list" => [
					Nette\PhpGenerator\Helpers::createObject('Nette\Application\Routers\Route', [
						"\x00Nette\\Application\\Routers\\Route\x00mask" => '[<locale=sk sk|en>/]admin/client/<action>[/<id>]',
						"\x00Nette\\Application\\Routers\\Route\x00sequence" => [
							'',
							'[',
							'',
							'locale',
							'/',
							']',
							'admin/client/',
							'action',
							'',
							'[',
							'/',
							'id',
							'',
							']',
							'',
						],
						"\x00Nette\\Application\\Routers\\Route\x00re" => '#(?:(?P<p5>(?U)sk|en)/)?admin/client/(?:(?P<p14>(?U)[a-z][a-z0-9-]*)(?:/(?P<p23>(?U)[^/]+))?)?/?\z#A',
						"\x00Nette\\Application\\Routers\\Route\x00aliases" => ['p23' => 'id', 'p14' => 'action', 'p5' => 'locale'],
						"\x00Nette\\Application\\Routers\\Route\x00metadata" => [
							'presenter' => ['value' => 'Client', 'fixity' => 2],
							'action' => [
								'value' => 'default',
								'fixity' => 1,
								'pattern' => '#(?:[a-z][a-z0-9-]*)\z#A',
								'filterIn' => ['Nette\Application\Routers\Route', 'path2action'],
								'filterOut' => ['Nette\Application\Routers\Route', 'action2path'],
								'filterTable2' => null,
								'defOut' => 'default',
							],
							'id' => [
								'pattern' => '#(?:[^/]+)\z#A',
								'filterOut' => ['Nette\Application\Routers\Route', 'param2path'],
								'filterTable2' => null,
								'defOut' => null,
								'value' => null,
								'fixity' => 1,
							],
							'locale' => [
								'pattern' => '#(?:sk|en)\z#A',
								'filterOut' => ['Nette\Application\Routers\Route', 'param2path'],
								'value' => 'sk',
								'fixity' => 1,
								'filterTable2' => null,
								'defOut' => 'sk',
							],
						],
						"\x00Nette\\Application\\Routers\\Route\x00xlat" => [],
						"\x00Nette\\Application\\Routers\\Route\x00type" => 3,
						"\x00Nette\\Application\\Routers\\Route\x00scheme" => null,
						"\x00Nette\\Application\\Routers\\Route\x00flags" => 0,
						"\x00Nette\\Application\\Routers\\Route\x00lastRefUrl" => null,
						"\x00Nette\\Application\\Routers\\Route\x00lastBaseUrl" => null,
					]),
				],
			]),
			Nette\PhpGenerator\Helpers::createObject('Nette\Application\Routers\RouteList', [
				"\x00Nette\\Application\\Routers\\RouteList\x00cachedRoutes" => null,
				"\x00Nette\\Application\\Routers\\RouteList\x00module" => 'Admin:Settings:',
				"\x00Nette\\Utils\\ArrayList\x00list" => [
					Nette\PhpGenerator\Helpers::createObject('Nette\Application\Routers\Route', [
						"\x00Nette\\Application\\Routers\\Route\x00mask" => '[<locale=sk sk|en>/]admin/settings/<presenter>/<action>[/<id>]',
						"\x00Nette\\Application\\Routers\\Route\x00sequence" => [
							'',
							'[',
							'',
							'locale',
							'/',
							']',
							'admin/settings/',
							'presenter',
							'/',
							'action',
							'',
							'[',
							'/',
							'id',
							'',
							']',
							'',
						],
						"\x00Nette\\Application\\Routers\\Route\x00re" => '#(?:(?P<p5>(?U)sk|en)/)?admin/settings/(?:(?P<p14>(?U)[a-z][a-z0-9.-]*)/(?:(?P<p18>(?U)[a-z][a-z0-9-]*)(?:/(?P<p27>(?U)[^/]+))?)?)?/?\z#A',
						"\x00Nette\\Application\\Routers\\Route\x00aliases" => [
							'p27' => 'id',
							'p18' => 'action',
							'p14' => 'presenter',
							'p5' => 'locale',
						],
						"\x00Nette\\Application\\Routers\\Route\x00metadata" => [
							'presenter' => [
								'value' => 'Settings',
								'fixity' => 1,
								'pattern' => '#(?:[a-z][a-z0-9.-]*)\z#A',
								'filterIn' => ['Nette\Application\Routers\Route', 'path2presenter'],
								'filterOut' => ['Nette\Application\Routers\Route', 'presenter2path'],
								'filterTable2' => null,
								'defOut' => 'settings',
							],
							'action' => [
								'value' => 'default',
								'fixity' => 1,
								'pattern' => '#(?:[a-z][a-z0-9-]*)\z#A',
								'filterIn' => ['Nette\Application\Routers\Route', 'path2action'],
								'filterOut' => ['Nette\Application\Routers\Route', 'action2path'],
								'filterTable2' => null,
								'defOut' => 'default',
							],
							'id' => [
								'pattern' => '#(?:[^/]+)\z#A',
								'filterOut' => ['Nette\Application\Routers\Route', 'param2path'],
								'filterTable2' => null,
								'defOut' => null,
								'value' => null,
								'fixity' => 1,
							],
							'locale' => [
								'pattern' => '#(?:sk|en)\z#A',
								'filterOut' => ['Nette\Application\Routers\Route', 'param2path'],
								'value' => 'sk',
								'fixity' => 1,
								'filterTable2' => null,
								'defOut' => 'sk',
							],
						],
						"\x00Nette\\Application\\Routers\\Route\x00xlat" => [],
						"\x00Nette\\Application\\Routers\\Route\x00type" => 3,
						"\x00Nette\\Application\\Routers\\Route\x00scheme" => null,
						"\x00Nette\\Application\\Routers\\Route\x00flags" => 0,
						"\x00Nette\\Application\\Routers\\Route\x00lastRefUrl" => null,
						"\x00Nette\\Application\\Routers\\Route\x00lastBaseUrl" => null,
					]),
				],
			]),
			Nette\PhpGenerator\Helpers::createObject('Nette\Application\Routers\RouteList', [
				"\x00Nette\\Application\\Routers\\RouteList\x00cachedRoutes" => null,
				"\x00Nette\\Application\\Routers\\RouteList\x00module" => 'Admin:Settings:',
				"\x00Nette\\Utils\\ArrayList\x00list" => [
					Nette\PhpGenerator\Helpers::createObject('Nette\Application\Routers\Route', [
						"\x00Nette\\Application\\Routers\\Route\x00mask" => '[<locale=sk sk|en>/]admin/settings/<action>[/<id>]',
						"\x00Nette\\Application\\Routers\\Route\x00sequence" => [
							'',
							'[',
							'',
							'locale',
							'/',
							']',
							'admin/settings/',
							'action',
							'',
							'[',
							'/',
							'id',
							'',
							']',
							'',
						],
						"\x00Nette\\Application\\Routers\\Route\x00re" => '#(?:(?P<p5>(?U)sk|en)/)?admin/settings/(?:(?P<p14>(?U)[a-z][a-z0-9-]*)(?:/(?P<p23>(?U)[^/]+))?)?/?\z#A',
						"\x00Nette\\Application\\Routers\\Route\x00aliases" => ['p23' => 'id', 'p14' => 'action', 'p5' => 'locale'],
						"\x00Nette\\Application\\Routers\\Route\x00metadata" => [
							'presenter' => ['value' => 'Settings', 'fixity' => 2],
							'action' => [
								'value' => 'default',
								'fixity' => 1,
								'pattern' => '#(?:[a-z][a-z0-9-]*)\z#A',
								'filterIn' => ['Nette\Application\Routers\Route', 'path2action'],
								'filterOut' => ['Nette\Application\Routers\Route', 'action2path'],
								'filterTable2' => null,
								'defOut' => 'default',
							],
							'id' => [
								'pattern' => '#(?:[^/]+)\z#A',
								'filterOut' => ['Nette\Application\Routers\Route', 'param2path'],
								'filterTable2' => null,
								'defOut' => null,
								'value' => null,
								'fixity' => 1,
							],
							'locale' => [
								'pattern' => '#(?:sk|en)\z#A',
								'filterOut' => ['Nette\Application\Routers\Route', 'param2path'],
								'value' => 'sk',
								'fixity' => 1,
								'filterTable2' => null,
								'defOut' => 'sk',
							],
						],
						"\x00Nette\\Application\\Routers\\Route\x00xlat" => [],
						"\x00Nette\\Application\\Routers\\Route\x00type" => 3,
						"\x00Nette\\Application\\Routers\\Route\x00scheme" => null,
						"\x00Nette\\Application\\Routers\\Route\x00flags" => 0,
						"\x00Nette\\Application\\Routers\\Route\x00lastRefUrl" => null,
						"\x00Nette\\Application\\Routers\\Route\x00lastBaseUrl" => null,
					]),
				],
			]),
			Nette\PhpGenerator\Helpers::createObject('Nette\Application\Routers\RouteList', [
				"\x00Nette\\Application\\Routers\\RouteList\x00cachedRoutes" => null,
				"\x00Nette\\Application\\Routers\\RouteList\x00module" => 'Admin:Help:',
				"\x00Nette\\Utils\\ArrayList\x00list" => [
					Nette\PhpGenerator\Helpers::createObject('Nette\Application\Routers\Route', [
						"\x00Nette\\Application\\Routers\\Route\x00mask" => '[<locale=sk sk|en>/]admin/help/<presenter>/<action>[/<id>]',
						"\x00Nette\\Application\\Routers\\Route\x00sequence" => [
							'',
							'[',
							'',
							'locale',
							'/',
							']',
							'admin/help/',
							'presenter',
							'/',
							'action',
							'',
							'[',
							'/',
							'id',
							'',
							']',
							'',
						],
						"\x00Nette\\Application\\Routers\\Route\x00re" => '#(?:(?P<p5>(?U)sk|en)/)?admin/help/(?:(?P<p14>(?U)[a-z][a-z0-9.-]*)/(?:(?P<p18>(?U)[a-z][a-z0-9-]*)(?:/(?P<p27>(?U)[^/]+))?)?)?/?\z#A',
						"\x00Nette\\Application\\Routers\\Route\x00aliases" => [
							'p27' => 'id',
							'p18' => 'action',
							'p14' => 'presenter',
							'p5' => 'locale',
						],
						"\x00Nette\\Application\\Routers\\Route\x00metadata" => [
							'presenter' => [
								'value' => 'Help',
								'fixity' => 1,
								'pattern' => '#(?:[a-z][a-z0-9.-]*)\z#A',
								'filterIn' => ['Nette\Application\Routers\Route', 'path2presenter'],
								'filterOut' => ['Nette\Application\Routers\Route', 'presenter2path'],
								'filterTable2' => null,
								'defOut' => 'help',
							],
							'action' => [
								'value' => 'default',
								'fixity' => 1,
								'pattern' => '#(?:[a-z][a-z0-9-]*)\z#A',
								'filterIn' => ['Nette\Application\Routers\Route', 'path2action'],
								'filterOut' => ['Nette\Application\Routers\Route', 'action2path'],
								'filterTable2' => null,
								'defOut' => 'default',
							],
							'id' => [
								'pattern' => '#(?:[^/]+)\z#A',
								'filterOut' => ['Nette\Application\Routers\Route', 'param2path'],
								'filterTable2' => null,
								'defOut' => null,
								'value' => null,
								'fixity' => 1,
							],
							'locale' => [
								'pattern' => '#(?:sk|en)\z#A',
								'filterOut' => ['Nette\Application\Routers\Route', 'param2path'],
								'value' => 'sk',
								'fixity' => 1,
								'filterTable2' => null,
								'defOut' => 'sk',
							],
						],
						"\x00Nette\\Application\\Routers\\Route\x00xlat" => [],
						"\x00Nette\\Application\\Routers\\Route\x00type" => 3,
						"\x00Nette\\Application\\Routers\\Route\x00scheme" => null,
						"\x00Nette\\Application\\Routers\\Route\x00flags" => 0,
						"\x00Nette\\Application\\Routers\\Route\x00lastRefUrl" => null,
						"\x00Nette\\Application\\Routers\\Route\x00lastBaseUrl" => null,
					]),
				],
			]),
			Nette\PhpGenerator\Helpers::createObject('Nette\Application\Routers\RouteList', [
				"\x00Nette\\Application\\Routers\\RouteList\x00cachedRoutes" => null,
				"\x00Nette\\Application\\Routers\\RouteList\x00module" => 'Admin:Help:',
				"\x00Nette\\Utils\\ArrayList\x00list" => [
					Nette\PhpGenerator\Helpers::createObject('Nette\Application\Routers\Route', [
						"\x00Nette\\Application\\Routers\\Route\x00mask" => '[<locale=sk sk|en>/]admin/help/<action>[/<id>]',
						"\x00Nette\\Application\\Routers\\Route\x00sequence" => [
							'',
							'[',
							'',
							'locale',
							'/',
							']',
							'admin/help/',
							'action',
							'',
							'[',
							'/',
							'id',
							'',
							']',
							'',
						],
						"\x00Nette\\Application\\Routers\\Route\x00re" => '#(?:(?P<p5>(?U)sk|en)/)?admin/help/(?:(?P<p14>(?U)[a-z][a-z0-9-]*)(?:/(?P<p23>(?U)[^/]+))?)?/?\z#A',
						"\x00Nette\\Application\\Routers\\Route\x00aliases" => ['p23' => 'id', 'p14' => 'action', 'p5' => 'locale'],
						"\x00Nette\\Application\\Routers\\Route\x00metadata" => [
							'presenter' => ['value' => 'Help', 'fixity' => 2],
							'action' => [
								'value' => 'default',
								'fixity' => 1,
								'pattern' => '#(?:[a-z][a-z0-9-]*)\z#A',
								'filterIn' => ['Nette\Application\Routers\Route', 'path2action'],
								'filterOut' => ['Nette\Application\Routers\Route', 'action2path'],
								'filterTable2' => null,
								'defOut' => 'default',
							],
							'id' => [
								'pattern' => '#(?:[^/]+)\z#A',
								'filterOut' => ['Nette\Application\Routers\Route', 'param2path'],
								'filterTable2' => null,
								'defOut' => null,
								'value' => null,
								'fixity' => 1,
							],
							'locale' => [
								'pattern' => '#(?:sk|en)\z#A',
								'filterOut' => ['Nette\Application\Routers\Route', 'param2path'],
								'value' => 'sk',
								'fixity' => 1,
								'filterTable2' => null,
								'defOut' => 'sk',
							],
						],
						"\x00Nette\\Application\\Routers\\Route\x00xlat" => [],
						"\x00Nette\\Application\\Routers\\Route\x00type" => 3,
						"\x00Nette\\Application\\Routers\\Route\x00scheme" => null,
						"\x00Nette\\Application\\Routers\\Route\x00flags" => 0,
						"\x00Nette\\Application\\Routers\\Route\x00lastRefUrl" => null,
						"\x00Nette\\Application\\Routers\\Route\x00lastBaseUrl" => null,
					]),
				],
			]),
			Nette\PhpGenerator\Helpers::createObject('Nette\Application\Routers\RouteList', [
				"\x00Nette\\Application\\Routers\\RouteList\x00cachedRoutes" => null,
				"\x00Nette\\Application\\Routers\\RouteList\x00module" => 'Admin:Mailer:',
				"\x00Nette\\Utils\\ArrayList\x00list" => [
					Nette\PhpGenerator\Helpers::createObject('Nette\Application\Routers\Route', [
						"\x00Nette\\Application\\Routers\\Route\x00mask" => '[<locale=sk sk|en>/]admin/mailer/<presenter>/<action>[/<id>]',
						"\x00Nette\\Application\\Routers\\Route\x00sequence" => [
							'',
							'[',
							'',
							'locale',
							'/',
							']',
							'admin/mailer/',
							'presenter',
							'/',
							'action',
							'',
							'[',
							'/',
							'id',
							'',
							']',
							'',
						],
						"\x00Nette\\Application\\Routers\\Route\x00re" => '#(?:(?P<p5>(?U)sk|en)/)?admin/mailer/(?:(?P<p14>(?U)[a-z][a-z0-9.-]*)/(?:(?P<p18>(?U)[a-z][a-z0-9-]*)(?:/(?P<p27>(?U)[^/]+))?)?)?/?\z#A',
						"\x00Nette\\Application\\Routers\\Route\x00aliases" => [
							'p27' => 'id',
							'p18' => 'action',
							'p14' => 'presenter',
							'p5' => 'locale',
						],
						"\x00Nette\\Application\\Routers\\Route\x00metadata" => [
							'presenter' => [
								'value' => 'Mailer',
								'fixity' => 1,
								'pattern' => '#(?:[a-z][a-z0-9.-]*)\z#A',
								'filterIn' => ['Nette\Application\Routers\Route', 'path2presenter'],
								'filterOut' => ['Nette\Application\Routers\Route', 'presenter2path'],
								'filterTable2' => null,
								'defOut' => 'mailer',
							],
							'action' => [
								'value' => 'default',
								'fixity' => 1,
								'pattern' => '#(?:[a-z][a-z0-9-]*)\z#A',
								'filterIn' => ['Nette\Application\Routers\Route', 'path2action'],
								'filterOut' => ['Nette\Application\Routers\Route', 'action2path'],
								'filterTable2' => null,
								'defOut' => 'default',
							],
							'id' => [
								'pattern' => '#(?:[^/]+)\z#A',
								'filterOut' => ['Nette\Application\Routers\Route', 'param2path'],
								'filterTable2' => null,
								'defOut' => null,
								'value' => null,
								'fixity' => 1,
							],
							'locale' => [
								'pattern' => '#(?:sk|en)\z#A',
								'filterOut' => ['Nette\Application\Routers\Route', 'param2path'],
								'value' => 'sk',
								'fixity' => 1,
								'filterTable2' => null,
								'defOut' => 'sk',
							],
						],
						"\x00Nette\\Application\\Routers\\Route\x00xlat" => [],
						"\x00Nette\\Application\\Routers\\Route\x00type" => 3,
						"\x00Nette\\Application\\Routers\\Route\x00scheme" => null,
						"\x00Nette\\Application\\Routers\\Route\x00flags" => 0,
						"\x00Nette\\Application\\Routers\\Route\x00lastRefUrl" => null,
						"\x00Nette\\Application\\Routers\\Route\x00lastBaseUrl" => null,
					]),
				],
			]),
			Nette\PhpGenerator\Helpers::createObject('Nette\Application\Routers\RouteList', [
				"\x00Nette\\Application\\Routers\\RouteList\x00cachedRoutes" => null,
				"\x00Nette\\Application\\Routers\\RouteList\x00module" => 'Admin:Mailer:',
				"\x00Nette\\Utils\\ArrayList\x00list" => [
					Nette\PhpGenerator\Helpers::createObject('Nette\Application\Routers\Route', [
						"\x00Nette\\Application\\Routers\\Route\x00mask" => '[<locale=sk sk|en>/]admin/mailer/<action>[/<id>]',
						"\x00Nette\\Application\\Routers\\Route\x00sequence" => [
							'',
							'[',
							'',
							'locale',
							'/',
							']',
							'admin/mailer/',
							'action',
							'',
							'[',
							'/',
							'id',
							'',
							']',
							'',
						],
						"\x00Nette\\Application\\Routers\\Route\x00re" => '#(?:(?P<p5>(?U)sk|en)/)?admin/mailer/(?:(?P<p14>(?U)[a-z][a-z0-9-]*)(?:/(?P<p23>(?U)[^/]+))?)?/?\z#A',
						"\x00Nette\\Application\\Routers\\Route\x00aliases" => ['p23' => 'id', 'p14' => 'action', 'p5' => 'locale'],
						"\x00Nette\\Application\\Routers\\Route\x00metadata" => [
							'presenter' => ['value' => 'Mailer', 'fixity' => 2],
							'action' => [
								'value' => 'default',
								'fixity' => 1,
								'pattern' => '#(?:[a-z][a-z0-9-]*)\z#A',
								'filterIn' => ['Nette\Application\Routers\Route', 'path2action'],
								'filterOut' => ['Nette\Application\Routers\Route', 'action2path'],
								'filterTable2' => null,
								'defOut' => 'default',
							],
							'id' => [
								'pattern' => '#(?:[^/]+)\z#A',
								'filterOut' => ['Nette\Application\Routers\Route', 'param2path'],
								'filterTable2' => null,
								'defOut' => null,
								'value' => null,
								'fixity' => 1,
							],
							'locale' => [
								'pattern' => '#(?:sk|en)\z#A',
								'filterOut' => ['Nette\Application\Routers\Route', 'param2path'],
								'value' => 'sk',
								'fixity' => 1,
								'filterTable2' => null,
								'defOut' => 'sk',
							],
						],
						"\x00Nette\\Application\\Routers\\Route\x00xlat" => [],
						"\x00Nette\\Application\\Routers\\Route\x00type" => 3,
						"\x00Nette\\Application\\Routers\\Route\x00scheme" => null,
						"\x00Nette\\Application\\Routers\\Route\x00flags" => 0,
						"\x00Nette\\Application\\Routers\\Route\x00lastRefUrl" => null,
						"\x00Nette\\Application\\Routers\\Route\x00lastBaseUrl" => null,
					]),
				],
			]),
			Nette\PhpGenerator\Helpers::createObject('Nette\Application\Routers\RouteList', [
				"\x00Nette\\Application\\Routers\\RouteList\x00cachedRoutes" => null,
				"\x00Nette\\Application\\Routers\\RouteList\x00module" => 'Admin:Multimedia:',
				"\x00Nette\\Utils\\ArrayList\x00list" => [
					Nette\PhpGenerator\Helpers::createObject('Nette\Application\Routers\Route', [
						"\x00Nette\\Application\\Routers\\Route\x00mask" => '[<locale=sk sk|en>/]admin/multimedia/<presenter>/<action>[/<id>]',
						"\x00Nette\\Application\\Routers\\Route\x00sequence" => [
							'',
							'[',
							'',
							'locale',
							'/',
							']',
							'admin/multimedia/',
							'presenter',
							'/',
							'action',
							'',
							'[',
							'/',
							'id',
							'',
							']',
							'',
						],
						"\x00Nette\\Application\\Routers\\Route\x00re" => '#(?:(?P<p5>(?U)sk|en)/)?admin/multimedia/(?:(?P<p14>(?U)[a-z][a-z0-9.-]*)/(?:(?P<p18>(?U)[a-z][a-z0-9-]*)(?:/(?P<p27>(?U)[^/]+))?)?)?/?\z#A',
						"\x00Nette\\Application\\Routers\\Route\x00aliases" => [
							'p27' => 'id',
							'p18' => 'action',
							'p14' => 'presenter',
							'p5' => 'locale',
						],
						"\x00Nette\\Application\\Routers\\Route\x00metadata" => [
							'presenter' => [
								'value' => 'Multimedia',
								'fixity' => 1,
								'pattern' => '#(?:[a-z][a-z0-9.-]*)\z#A',
								'filterIn' => ['Nette\Application\Routers\Route', 'path2presenter'],
								'filterOut' => ['Nette\Application\Routers\Route', 'presenter2path'],
								'filterTable2' => null,
								'defOut' => 'multimedia',
							],
							'action' => [
								'value' => 'default',
								'fixity' => 1,
								'pattern' => '#(?:[a-z][a-z0-9-]*)\z#A',
								'filterIn' => ['Nette\Application\Routers\Route', 'path2action'],
								'filterOut' => ['Nette\Application\Routers\Route', 'action2path'],
								'filterTable2' => null,
								'defOut' => 'default',
							],
							'id' => [
								'pattern' => '#(?:[^/]+)\z#A',
								'filterOut' => ['Nette\Application\Routers\Route', 'param2path'],
								'filterTable2' => null,
								'defOut' => null,
								'value' => null,
								'fixity' => 1,
							],
							'locale' => [
								'pattern' => '#(?:sk|en)\z#A',
								'filterOut' => ['Nette\Application\Routers\Route', 'param2path'],
								'value' => 'sk',
								'fixity' => 1,
								'filterTable2' => null,
								'defOut' => 'sk',
							],
						],
						"\x00Nette\\Application\\Routers\\Route\x00xlat" => [],
						"\x00Nette\\Application\\Routers\\Route\x00type" => 3,
						"\x00Nette\\Application\\Routers\\Route\x00scheme" => null,
						"\x00Nette\\Application\\Routers\\Route\x00flags" => 0,
						"\x00Nette\\Application\\Routers\\Route\x00lastRefUrl" => null,
						"\x00Nette\\Application\\Routers\\Route\x00lastBaseUrl" => null,
					]),
				],
			]),
			Nette\PhpGenerator\Helpers::createObject('Nette\Application\Routers\RouteList', [
				"\x00Nette\\Application\\Routers\\RouteList\x00cachedRoutes" => null,
				"\x00Nette\\Application\\Routers\\RouteList\x00module" => 'Admin:Multimedia:',
				"\x00Nette\\Utils\\ArrayList\x00list" => [
					Nette\PhpGenerator\Helpers::createObject('Nette\Application\Routers\Route', [
						"\x00Nette\\Application\\Routers\\Route\x00mask" => '[<locale=sk sk|en>/]admin/multimedia/<action>[/<id>]',
						"\x00Nette\\Application\\Routers\\Route\x00sequence" => [
							'',
							'[',
							'',
							'locale',
							'/',
							']',
							'admin/multimedia/',
							'action',
							'',
							'[',
							'/',
							'id',
							'',
							']',
							'',
						],
						"\x00Nette\\Application\\Routers\\Route\x00re" => '#(?:(?P<p5>(?U)sk|en)/)?admin/multimedia/(?:(?P<p14>(?U)[a-z][a-z0-9-]*)(?:/(?P<p23>(?U)[^/]+))?)?/?\z#A',
						"\x00Nette\\Application\\Routers\\Route\x00aliases" => ['p23' => 'id', 'p14' => 'action', 'p5' => 'locale'],
						"\x00Nette\\Application\\Routers\\Route\x00metadata" => [
							'presenter' => ['value' => 'Multimedia', 'fixity' => 2],
							'action' => [
								'value' => 'default',
								'fixity' => 1,
								'pattern' => '#(?:[a-z][a-z0-9-]*)\z#A',
								'filterIn' => ['Nette\Application\Routers\Route', 'path2action'],
								'filterOut' => ['Nette\Application\Routers\Route', 'action2path'],
								'filterTable2' => null,
								'defOut' => 'default',
							],
							'id' => [
								'pattern' => '#(?:[^/]+)\z#A',
								'filterOut' => ['Nette\Application\Routers\Route', 'param2path'],
								'filterTable2' => null,
								'defOut' => null,
								'value' => null,
								'fixity' => 1,
							],
							'locale' => [
								'pattern' => '#(?:sk|en)\z#A',
								'filterOut' => ['Nette\Application\Routers\Route', 'param2path'],
								'value' => 'sk',
								'fixity' => 1,
								'filterTable2' => null,
								'defOut' => 'sk',
							],
						],
						"\x00Nette\\Application\\Routers\\Route\x00xlat" => [],
						"\x00Nette\\Application\\Routers\\Route\x00type" => 3,
						"\x00Nette\\Application\\Routers\\Route\x00scheme" => null,
						"\x00Nette\\Application\\Routers\\Route\x00flags" => 0,
						"\x00Nette\\Application\\Routers\\Route\x00lastRefUrl" => null,
						"\x00Nette\\Application\\Routers\\Route\x00lastBaseUrl" => null,
					]),
				],
			]),
			Nette\PhpGenerator\Helpers::createObject('Nette\Application\Routers\RouteList', [
				"\x00Nette\\Application\\Routers\\RouteList\x00cachedRoutes" => null,
				"\x00Nette\\Application\\Routers\\RouteList\x00module" => 'Admin:Profile:',
				"\x00Nette\\Utils\\ArrayList\x00list" => [
					Nette\PhpGenerator\Helpers::createObject('Nette\Application\Routers\Route', [
						"\x00Nette\\Application\\Routers\\Route\x00mask" => '[<locale=sk sk|en>/]admin/profile/<presenter>/<action>[/<id>]',
						"\x00Nette\\Application\\Routers\\Route\x00sequence" => [
							'',
							'[',
							'',
							'locale',
							'/',
							']',
							'admin/profile/',
							'presenter',
							'/',
							'action',
							'',
							'[',
							'/',
							'id',
							'',
							']',
							'',
						],
						"\x00Nette\\Application\\Routers\\Route\x00re" => '#(?:(?P<p5>(?U)sk|en)/)?admin/profile/(?:(?P<p14>(?U)[a-z][a-z0-9.-]*)/(?:(?P<p18>(?U)[a-z][a-z0-9-]*)(?:/(?P<p27>(?U)[^/]+))?)?)?/?\z#A',
						"\x00Nette\\Application\\Routers\\Route\x00aliases" => [
							'p27' => 'id',
							'p18' => 'action',
							'p14' => 'presenter',
							'p5' => 'locale',
						],
						"\x00Nette\\Application\\Routers\\Route\x00metadata" => [
							'presenter' => [
								'value' => 'Profile',
								'fixity' => 1,
								'pattern' => '#(?:[a-z][a-z0-9.-]*)\z#A',
								'filterIn' => ['Nette\Application\Routers\Route', 'path2presenter'],
								'filterOut' => ['Nette\Application\Routers\Route', 'presenter2path'],
								'filterTable2' => null,
								'defOut' => 'profile',
							],
							'action' => [
								'value' => 'default',
								'fixity' => 1,
								'pattern' => '#(?:[a-z][a-z0-9-]*)\z#A',
								'filterIn' => ['Nette\Application\Routers\Route', 'path2action'],
								'filterOut' => ['Nette\Application\Routers\Route', 'action2path'],
								'filterTable2' => null,
								'defOut' => 'default',
							],
							'id' => [
								'pattern' => '#(?:[^/]+)\z#A',
								'filterOut' => ['Nette\Application\Routers\Route', 'param2path'],
								'filterTable2' => null,
								'defOut' => null,
								'value' => null,
								'fixity' => 1,
							],
							'locale' => [
								'pattern' => '#(?:sk|en)\z#A',
								'filterOut' => ['Nette\Application\Routers\Route', 'param2path'],
								'value' => 'sk',
								'fixity' => 1,
								'filterTable2' => null,
								'defOut' => 'sk',
							],
						],
						"\x00Nette\\Application\\Routers\\Route\x00xlat" => [],
						"\x00Nette\\Application\\Routers\\Route\x00type" => 3,
						"\x00Nette\\Application\\Routers\\Route\x00scheme" => null,
						"\x00Nette\\Application\\Routers\\Route\x00flags" => 0,
						"\x00Nette\\Application\\Routers\\Route\x00lastRefUrl" => null,
						"\x00Nette\\Application\\Routers\\Route\x00lastBaseUrl" => null,
					]),
				],
			]),
			Nette\PhpGenerator\Helpers::createObject('Nette\Application\Routers\RouteList', [
				"\x00Nette\\Application\\Routers\\RouteList\x00cachedRoutes" => null,
				"\x00Nette\\Application\\Routers\\RouteList\x00module" => 'Admin:Profile:',
				"\x00Nette\\Utils\\ArrayList\x00list" => [
					Nette\PhpGenerator\Helpers::createObject('Nette\Application\Routers\Route', [
						"\x00Nette\\Application\\Routers\\Route\x00mask" => '[<locale=sk sk|en>/]admin/profile/<action>[/<id>]',
						"\x00Nette\\Application\\Routers\\Route\x00sequence" => [
							'',
							'[',
							'',
							'locale',
							'/',
							']',
							'admin/profile/',
							'action',
							'',
							'[',
							'/',
							'id',
							'',
							']',
							'',
						],
						"\x00Nette\\Application\\Routers\\Route\x00re" => '#(?:(?P<p5>(?U)sk|en)/)?admin/profile/(?:(?P<p14>(?U)[a-z][a-z0-9-]*)(?:/(?P<p23>(?U)[^/]+))?)?/?\z#A',
						"\x00Nette\\Application\\Routers\\Route\x00aliases" => ['p23' => 'id', 'p14' => 'action', 'p5' => 'locale'],
						"\x00Nette\\Application\\Routers\\Route\x00metadata" => [
							'presenter' => ['value' => 'Profile', 'fixity' => 2],
							'action' => [
								'value' => 'default',
								'fixity' => 1,
								'pattern' => '#(?:[a-z][a-z0-9-]*)\z#A',
								'filterIn' => ['Nette\Application\Routers\Route', 'path2action'],
								'filterOut' => ['Nette\Application\Routers\Route', 'action2path'],
								'filterTable2' => null,
								'defOut' => 'default',
							],
							'id' => [
								'pattern' => '#(?:[^/]+)\z#A',
								'filterOut' => ['Nette\Application\Routers\Route', 'param2path'],
								'filterTable2' => null,
								'defOut' => null,
								'value' => null,
								'fixity' => 1,
							],
							'locale' => [
								'pattern' => '#(?:sk|en)\z#A',
								'filterOut' => ['Nette\Application\Routers\Route', 'param2path'],
								'value' => 'sk',
								'fixity' => 1,
								'filterTable2' => null,
								'defOut' => 'sk',
							],
						],
						"\x00Nette\\Application\\Routers\\Route\x00xlat" => [],
						"\x00Nette\\Application\\Routers\\Route\x00type" => 3,
						"\x00Nette\\Application\\Routers\\Route\x00scheme" => null,
						"\x00Nette\\Application\\Routers\\Route\x00flags" => 0,
						"\x00Nette\\Application\\Routers\\Route\x00lastRefUrl" => null,
						"\x00Nette\\Application\\Routers\\Route\x00lastBaseUrl" => null,
					]),
				],
			]),
			Nette\PhpGenerator\Helpers::createObject('Nette\Application\Routers\RouteList', [
				"\x00Nette\\Application\\Routers\\RouteList\x00cachedRoutes" => null,
				"\x00Nette\\Application\\Routers\\RouteList\x00module" => 'Admin:Homepage:',
				"\x00Nette\\Utils\\ArrayList\x00list" => [
					Nette\PhpGenerator\Helpers::createObject('Nette\Application\Routers\Route', [
						"\x00Nette\\Application\\Routers\\Route\x00mask" => '[<locale=sk sk|en>/]admin/login',
						"\x00Nette\\Application\\Routers\\Route\x00sequence" => ['', '[', '', 'locale', '/', ']', 'admin/login'],
						"\x00Nette\\Application\\Routers\\Route\x00re" => '#(?:(?P<p5>(?U)sk|en)/)?admin/login/?\z#A',
						"\x00Nette\\Application\\Routers\\Route\x00aliases" => ['p5' => 'locale'],
						"\x00Nette\\Application\\Routers\\Route\x00metadata" => [
							'presenter' => ['value' => 'Homepage', 'fixity' => 2],
							'action' => ['value' => 'login', 'fixity' => 2],
							'locale' => [
								'pattern' => '#(?:sk|en)\z#A',
								'filterOut' => ['Nette\Application\Routers\Route', 'param2path'],
								'value' => 'sk',
								'fixity' => 1,
								'filterTable2' => null,
								'defOut' => 'sk',
							],
						],
						"\x00Nette\\Application\\Routers\\Route\x00xlat" => [],
						"\x00Nette\\Application\\Routers\\Route\x00type" => 3,
						"\x00Nette\\Application\\Routers\\Route\x00scheme" => null,
						"\x00Nette\\Application\\Routers\\Route\x00flags" => 0,
						"\x00Nette\\Application\\Routers\\Route\x00lastRefUrl" => null,
						"\x00Nette\\Application\\Routers\\Route\x00lastBaseUrl" => null,
					]),
				],
			]),
			Nette\PhpGenerator\Helpers::createObject('Nette\Application\Routers\RouteList', [
				"\x00Nette\\Application\\Routers\\RouteList\x00cachedRoutes" => null,
				"\x00Nette\\Application\\Routers\\RouteList\x00module" => 'Admin:Homepage:',
				"\x00Nette\\Utils\\ArrayList\x00list" => [
					Nette\PhpGenerator\Helpers::createObject('Nette\Application\Routers\Route', [
						"\x00Nette\\Application\\Routers\\Route\x00mask" => '[<locale=sk sk|en>/]admin/homepage/<presenter>/<action>[/<id>]',
						"\x00Nette\\Application\\Routers\\Route\x00sequence" => [
							'',
							'[',
							'',
							'locale',
							'/',
							']',
							'admin/homepage/',
							'presenter',
							'/',
							'action',
							'',
							'[',
							'/',
							'id',
							'',
							']',
							'',
						],
						"\x00Nette\\Application\\Routers\\Route\x00re" => '#(?:(?P<p5>(?U)sk|en)/)?admin/homepage/(?:(?P<p14>(?U)[a-z][a-z0-9.-]*)/(?:(?P<p18>(?U)[a-z][a-z0-9-]*)(?:/(?P<p27>(?U)[^/]+))?)?)?/?\z#A',
						"\x00Nette\\Application\\Routers\\Route\x00aliases" => [
							'p27' => 'id',
							'p18' => 'action',
							'p14' => 'presenter',
							'p5' => 'locale',
						],
						"\x00Nette\\Application\\Routers\\Route\x00metadata" => [
							'presenter' => [
								'value' => 'Homepage',
								'fixity' => 1,
								'pattern' => '#(?:[a-z][a-z0-9.-]*)\z#A',
								'filterIn' => ['Nette\Application\Routers\Route', 'path2presenter'],
								'filterOut' => ['Nette\Application\Routers\Route', 'presenter2path'],
								'filterTable2' => null,
								'defOut' => 'homepage',
							],
							'action' => [
								'value' => 'default',
								'fixity' => 1,
								'pattern' => '#(?:[a-z][a-z0-9-]*)\z#A',
								'filterIn' => ['Nette\Application\Routers\Route', 'path2action'],
								'filterOut' => ['Nette\Application\Routers\Route', 'action2path'],
								'filterTable2' => null,
								'defOut' => 'default',
							],
							'id' => [
								'pattern' => '#(?:[^/]+)\z#A',
								'filterOut' => ['Nette\Application\Routers\Route', 'param2path'],
								'filterTable2' => null,
								'defOut' => null,
								'value' => null,
								'fixity' => 1,
							],
							'locale' => [
								'pattern' => '#(?:sk|en)\z#A',
								'filterOut' => ['Nette\Application\Routers\Route', 'param2path'],
								'value' => 'sk',
								'fixity' => 1,
								'filterTable2' => null,
								'defOut' => 'sk',
							],
						],
						"\x00Nette\\Application\\Routers\\Route\x00xlat" => [],
						"\x00Nette\\Application\\Routers\\Route\x00type" => 3,
						"\x00Nette\\Application\\Routers\\Route\x00scheme" => null,
						"\x00Nette\\Application\\Routers\\Route\x00flags" => 0,
						"\x00Nette\\Application\\Routers\\Route\x00lastRefUrl" => null,
						"\x00Nette\\Application\\Routers\\Route\x00lastBaseUrl" => null,
					]),
				],
			]),
			Nette\PhpGenerator\Helpers::createObject('Nette\Application\Routers\RouteList', [
				"\x00Nette\\Application\\Routers\\RouteList\x00cachedRoutes" => null,
				"\x00Nette\\Application\\Routers\\RouteList\x00module" => 'Admin:Homepage:',
				"\x00Nette\\Utils\\ArrayList\x00list" => [
					Nette\PhpGenerator\Helpers::createObject('Nette\Application\Routers\Route', [
						"\x00Nette\\Application\\Routers\\Route\x00mask" => '[<locale=sk sk|en>/]admin/homepage/<action>[/<id>]',
						"\x00Nette\\Application\\Routers\\Route\x00sequence" => [
							'',
							'[',
							'',
							'locale',
							'/',
							']',
							'admin/homepage/',
							'action',
							'',
							'[',
							'/',
							'id',
							'',
							']',
							'',
						],
						"\x00Nette\\Application\\Routers\\Route\x00re" => '#(?:(?P<p5>(?U)sk|en)/)?admin/homepage/(?:(?P<p14>(?U)[a-z][a-z0-9-]*)(?:/(?P<p23>(?U)[^/]+))?)?/?\z#A',
						"\x00Nette\\Application\\Routers\\Route\x00aliases" => ['p23' => 'id', 'p14' => 'action', 'p5' => 'locale'],
						"\x00Nette\\Application\\Routers\\Route\x00metadata" => [
							'presenter' => ['value' => 'Homepage', 'fixity' => 2],
							'action' => [
								'value' => 'default',
								'fixity' => 1,
								'pattern' => '#(?:[a-z][a-z0-9-]*)\z#A',
								'filterIn' => ['Nette\Application\Routers\Route', 'path2action'],
								'filterOut' => ['Nette\Application\Routers\Route', 'action2path'],
								'filterTable2' => null,
								'defOut' => 'default',
							],
							'id' => [
								'pattern' => '#(?:[^/]+)\z#A',
								'filterOut' => ['Nette\Application\Routers\Route', 'param2path'],
								'filterTable2' => null,
								'defOut' => null,
								'value' => null,
								'fixity' => 1,
							],
							'locale' => [
								'pattern' => '#(?:sk|en)\z#A',
								'filterOut' => ['Nette\Application\Routers\Route', 'param2path'],
								'value' => 'sk',
								'fixity' => 1,
								'filterTable2' => null,
								'defOut' => 'sk',
							],
						],
						"\x00Nette\\Application\\Routers\\Route\x00xlat" => [],
						"\x00Nette\\Application\\Routers\\Route\x00type" => 3,
						"\x00Nette\\Application\\Routers\\Route\x00scheme" => null,
						"\x00Nette\\Application\\Routers\\Route\x00flags" => 0,
						"\x00Nette\\Application\\Routers\\Route\x00lastRefUrl" => null,
						"\x00Nette\\Application\\Routers\\Route\x00lastBaseUrl" => null,
					]),
				],
			]),
			Nette\PhpGenerator\Helpers::createObject('Nette\Application\Routers\RouteList', [
				"\x00Nette\\Application\\Routers\\RouteList\x00cachedRoutes" => null,
				"\x00Nette\\Application\\Routers\\RouteList\x00module" => 'Admin:Homepage:',
				"\x00Nette\\Utils\\ArrayList\x00list" => [
					Nette\PhpGenerator\Helpers::createObject('Nette\Application\Routers\Route', [
						"\x00Nette\\Application\\Routers\\Route\x00mask" => '[<locale=sk sk|en>/]admin/<action>[/<id>]',
						"\x00Nette\\Application\\Routers\\Route\x00sequence" => [
							'',
							'[',
							'',
							'locale',
							'/',
							']',
							'admin/',
							'action',
							'',
							'[',
							'/',
							'id',
							'',
							']',
							'',
						],
						"\x00Nette\\Application\\Routers\\Route\x00re" => '#(?:(?P<p5>(?U)sk|en)/)?admin/(?:(?P<p14>(?U)[a-z][a-z0-9-]*)(?:/(?P<p23>(?U)[^/]+))?)?/?\z#A',
						"\x00Nette\\Application\\Routers\\Route\x00aliases" => ['p23' => 'id', 'p14' => 'action', 'p5' => 'locale'],
						"\x00Nette\\Application\\Routers\\Route\x00metadata" => [
							'presenter' => ['value' => 'Homepage', 'fixity' => 2],
							'action' => [
								'value' => 'default',
								'fixity' => 1,
								'pattern' => '#(?:[a-z][a-z0-9-]*)\z#A',
								'filterIn' => ['Nette\Application\Routers\Route', 'path2action'],
								'filterOut' => ['Nette\Application\Routers\Route', 'action2path'],
								'filterTable2' => null,
								'defOut' => 'default',
							],
							'id' => [
								'pattern' => '#(?:[^/]+)\z#A',
								'filterOut' => ['Nette\Application\Routers\Route', 'param2path'],
								'filterTable2' => null,
								'defOut' => null,
								'value' => null,
								'fixity' => 1,
							],
							'locale' => [
								'pattern' => '#(?:sk|en)\z#A',
								'filterOut' => ['Nette\Application\Routers\Route', 'param2path'],
								'value' => 'sk',
								'fixity' => 1,
								'filterTable2' => null,
								'defOut' => 'sk',
							],
						],
						"\x00Nette\\Application\\Routers\\Route\x00xlat" => [],
						"\x00Nette\\Application\\Routers\\Route\x00type" => 3,
						"\x00Nette\\Application\\Routers\\Route\x00scheme" => null,
						"\x00Nette\\Application\\Routers\\Route\x00flags" => 0,
						"\x00Nette\\Application\\Routers\\Route\x00lastRefUrl" => null,
						"\x00Nette\\Application\\Routers\\Route\x00lastBaseUrl" => null,
					]),
				],
			]),
			Nette\PhpGenerator\Helpers::createObject('Nette\Application\Routers\RouteList', [
				"\x00Nette\\Application\\Routers\\RouteList\x00cachedRoutes" => null,
				"\x00Nette\\Application\\Routers\\RouteList\x00module" => 'Admin:Authorizator:',
				"\x00Nette\\Utils\\ArrayList\x00list" => [
					Nette\PhpGenerator\Helpers::createObject('Nette\Application\Routers\Route', [
						"\x00Nette\\Application\\Routers\\Route\x00mask" => '[<locale=sk sk|en>/]admin/authorizator/<presenter>/<action>[/<id>]',
						"\x00Nette\\Application\\Routers\\Route\x00sequence" => [
							'',
							'[',
							'',
							'locale',
							'/',
							']',
							'admin/authorizator/',
							'presenter',
							'/',
							'action',
							'',
							'[',
							'/',
							'id',
							'',
							']',
							'',
						],
						"\x00Nette\\Application\\Routers\\Route\x00re" => '#(?:(?P<p5>(?U)sk|en)/)?admin/authorizator/(?:(?P<p14>(?U)[a-z][a-z0-9.-]*)/(?:(?P<p18>(?U)[a-z][a-z0-9-]*)(?:/(?P<p27>(?U)[^/]+))?)?)?/?\z#A',
						"\x00Nette\\Application\\Routers\\Route\x00aliases" => [
							'p27' => 'id',
							'p18' => 'action',
							'p14' => 'presenter',
							'p5' => 'locale',
						],
						"\x00Nette\\Application\\Routers\\Route\x00metadata" => [
							'presenter' => [
								'value' => 'Authorizator',
								'fixity' => 1,
								'pattern' => '#(?:[a-z][a-z0-9.-]*)\z#A',
								'filterIn' => ['Nette\Application\Routers\Route', 'path2presenter'],
								'filterOut' => ['Nette\Application\Routers\Route', 'presenter2path'],
								'filterTable2' => null,
								'defOut' => 'authorizator',
							],
							'action' => [
								'value' => 'default',
								'fixity' => 1,
								'pattern' => '#(?:[a-z][a-z0-9-]*)\z#A',
								'filterIn' => ['Nette\Application\Routers\Route', 'path2action'],
								'filterOut' => ['Nette\Application\Routers\Route', 'action2path'],
								'filterTable2' => null,
								'defOut' => 'default',
							],
							'id' => [
								'pattern' => '#(?:[^/]+)\z#A',
								'filterOut' => ['Nette\Application\Routers\Route', 'param2path'],
								'filterTable2' => null,
								'defOut' => null,
								'value' => null,
								'fixity' => 1,
							],
							'locale' => [
								'pattern' => '#(?:sk|en)\z#A',
								'filterOut' => ['Nette\Application\Routers\Route', 'param2path'],
								'value' => 'sk',
								'fixity' => 1,
								'filterTable2' => null,
								'defOut' => 'sk',
							],
						],
						"\x00Nette\\Application\\Routers\\Route\x00xlat" => [],
						"\x00Nette\\Application\\Routers\\Route\x00type" => 3,
						"\x00Nette\\Application\\Routers\\Route\x00scheme" => null,
						"\x00Nette\\Application\\Routers\\Route\x00flags" => 0,
						"\x00Nette\\Application\\Routers\\Route\x00lastRefUrl" => null,
						"\x00Nette\\Application\\Routers\\Route\x00lastBaseUrl" => null,
					]),
				],
			]),
			Nette\PhpGenerator\Helpers::createObject('Nette\Application\Routers\RouteList', [
				"\x00Nette\\Application\\Routers\\RouteList\x00cachedRoutes" => null,
				"\x00Nette\\Application\\Routers\\RouteList\x00module" => 'Admin:Authorizator:',
				"\x00Nette\\Utils\\ArrayList\x00list" => [
					Nette\PhpGenerator\Helpers::createObject('Nette\Application\Routers\Route', [
						"\x00Nette\\Application\\Routers\\Route\x00mask" => '[<locale=sk sk|en>/]admin/authorizator/<action>[/<id>]',
						"\x00Nette\\Application\\Routers\\Route\x00sequence" => [
							'',
							'[',
							'',
							'locale',
							'/',
							']',
							'admin/authorizator/',
							'action',
							'',
							'[',
							'/',
							'id',
							'',
							']',
							'',
						],
						"\x00Nette\\Application\\Routers\\Route\x00re" => '#(?:(?P<p5>(?U)sk|en)/)?admin/authorizator/(?:(?P<p14>(?U)[a-z][a-z0-9-]*)(?:/(?P<p23>(?U)[^/]+))?)?/?\z#A',
						"\x00Nette\\Application\\Routers\\Route\x00aliases" => ['p23' => 'id', 'p14' => 'action', 'p5' => 'locale'],
						"\x00Nette\\Application\\Routers\\Route\x00metadata" => [
							'presenter' => ['value' => 'Authorizator', 'fixity' => 2],
							'action' => [
								'value' => 'default',
								'fixity' => 1,
								'pattern' => '#(?:[a-z][a-z0-9-]*)\z#A',
								'filterIn' => ['Nette\Application\Routers\Route', 'path2action'],
								'filterOut' => ['Nette\Application\Routers\Route', 'action2path'],
								'filterTable2' => null,
								'defOut' => 'default',
							],
							'id' => [
								'pattern' => '#(?:[^/]+)\z#A',
								'filterOut' => ['Nette\Application\Routers\Route', 'param2path'],
								'filterTable2' => null,
								'defOut' => null,
								'value' => null,
								'fixity' => 1,
							],
							'locale' => [
								'pattern' => '#(?:sk|en)\z#A',
								'filterOut' => ['Nette\Application\Routers\Route', 'param2path'],
								'value' => 'sk',
								'fixity' => 1,
								'filterTable2' => null,
								'defOut' => 'sk',
							],
						],
						"\x00Nette\\Application\\Routers\\Route\x00xlat" => [],
						"\x00Nette\\Application\\Routers\\Route\x00type" => 3,
						"\x00Nette\\Application\\Routers\\Route\x00scheme" => null,
						"\x00Nette\\Application\\Routers\\Route\x00flags" => 0,
						"\x00Nette\\Application\\Routers\\Route\x00lastRefUrl" => null,
						"\x00Nette\\Application\\Routers\\Route\x00lastBaseUrl" => null,
					]),
				],
			]),
			Nette\PhpGenerator\Helpers::createObject('Nette\Application\Routers\RouteList', [
				"\x00Nette\\Application\\Routers\\RouteList\x00cachedRoutes" => null,
				"\x00Nette\\Application\\Routers\\RouteList\x00module" => 'Front:Domov:',
				"\x00Nette\\Utils\\ArrayList\x00list" => [
					Nette\PhpGenerator\Helpers::createObject('Nette\Application\Routers\Route', [
						"\x00Nette\\Application\\Routers\\Route\x00mask" => '[<locale=sk sk|en|de>/]<presenter>/<action>[/<id>]',
						"\x00Nette\\Application\\Routers\\Route\x00sequence" => [
							'',
							'[',
							'',
							'locale',
							'/',
							']',
							'',
							'presenter',
							'/',
							'action',
							'',
							'[',
							'/',
							'id',
							'',
							']',
							'',
						],
						"\x00Nette\\Application\\Routers\\Route\x00re" => '#(?:(?P<p5>(?U)sk|en|de)/)?(?:(?P<p14>(?U)[a-z][a-z0-9.-]*)/(?:(?P<p18>(?U)[a-z][a-z0-9-]*)(?:/(?P<p27>(?U)[^/]+))?)?)?/?\z#A',
						"\x00Nette\\Application\\Routers\\Route\x00aliases" => [
							'p27' => 'id',
							'p18' => 'action',
							'p14' => 'presenter',
							'p5' => 'locale',
						],
						"\x00Nette\\Application\\Routers\\Route\x00metadata" => [
							'presenter' => [
								'value' => 'Domov',
								'fixity' => 1,
								'pattern' => '#(?:[a-z][a-z0-9.-]*)\z#A',
								'filterIn' => ['Nette\Application\Routers\Route', 'path2presenter'],
								'filterOut' => ['Nette\Application\Routers\Route', 'presenter2path'],
								'filterTable2' => null,
								'defOut' => 'domov',
							],
							'action' => [
								'value' => 'default',
								'fixity' => 1,
								'pattern' => '#(?:[a-z][a-z0-9-]*)\z#A',
								'filterIn' => ['Nette\Application\Routers\Route', 'path2action'],
								'filterOut' => ['Nette\Application\Routers\Route', 'action2path'],
								'filterTable2' => null,
								'defOut' => 'default',
							],
							'id' => [
								'pattern' => '#(?:[^/]+)\z#A',
								'filterOut' => ['Nette\Application\Routers\Route', 'param2path'],
								'filterTable2' => null,
								'defOut' => null,
								'value' => null,
								'fixity' => 1,
							],
							'locale' => [
								'pattern' => '#(?:sk|en|de)\z#A',
								'filterOut' => ['Nette\Application\Routers\Route', 'param2path'],
								'value' => 'sk',
								'fixity' => 1,
								'filterTable2' => null,
								'defOut' => 'sk',
							],
						],
						"\x00Nette\\Application\\Routers\\Route\x00xlat" => [],
						"\x00Nette\\Application\\Routers\\Route\x00type" => 3,
						"\x00Nette\\Application\\Routers\\Route\x00scheme" => null,
						"\x00Nette\\Application\\Routers\\Route\x00flags" => 0,
						"\x00Nette\\Application\\Routers\\Route\x00lastRefUrl" => null,
						"\x00Nette\\Application\\Routers\\Route\x00lastBaseUrl" => null,
					]),
				],
			]),
		]);
		return $service;
	}


	public function createServiceRouting__router(): Nette\Application\IRouter
	{
		$service = $this->getService('routerFactory')->createRouter();
		return $service;
	}


	public function createServiceSecurity__user(): UserModule\Services\User
	{
		$service = new UserModule\Services\User($this->getService('user.userService'), $this->getService('authorizator.Authorizator'),
			$this->getService('security.userStorage'), $this->getService('authentication.authentication'));
		$this->getService('tracy.bar')->addPanel(new Nette\Bridges\SecurityTracy\UserPanel($service));
		$service->onLoggedIn = $this->getService('events.manager')->createEvent(['UserModule\Services\User', 'onLoggedIn'],
			$service->onLoggedIn, null, false);
		$service->onLoggedOut = $this->getService('events.manager')->createEvent(['UserModule\Services\User', 'onLoggedOut'],
			$service->onLoggedOut, null, false);
		return $service;
	}


	public function createServiceSecurity__userStorage(): Nette\Security\IUserStorage
	{
		$service = new Nette\Http\UserStorage($this->getService('session.session'));
		return $service;
	}


	public function createServiceSession__session(): Nette\Http\Session
	{
		$service = new Nette\Http\Session($this->getService('http.request'), $this->getService('http.response'));
		$service->setExpiration('14 days');
		return $service;
	}


	public function createServiceSettings__SettingsManager(): SettingsModule\Services\SettingsManager
	{
		$service = new SettingsModule\Services\SettingsManager($this->getService('mailer.ISettingsControlFactory'),
			$this->getService('homepage.ISettingsControlFactory'), $this->getService('project.IRoleSettingsControlFactory'));
		return $service;
	}


	public function createServiceSettings__fieldFormFactory(): SettingsModule\Factories\FieldFormFactory
	{
		$service = new SettingsModule\Factories\FieldFormFactory($this->getService('backend.default.HydratorService'),
			$this->getService('log.logService'), $this->getService('security.user'),
			$this->getService('backend.default.TranslatedFormFactory'));
		return $service;
	}


	public function createServiceSettings__generalSettingsFormFactory(): SettingsModule\Factories\GeneralSettingsFormFactory
	{
		$service = new SettingsModule\Factories\GeneralSettingsFormFactory($this->getService('log.logService'),
			$this->getService('security.user'), $this->getService('backend.default.HydratorService'),
			$this->getService('backend.default.TranslatedFormFactory'), $this->getService('client.clientService'),
			$this->getService('multimedia.iMultimediaSaver'));
		return $service;
	}


	public function createServiceSettings__groupFormFactory(): SettingsModule\Factories\GroupFormFactory
	{
		$service = new SettingsModule\Factories\GroupFormFactory($this->getService('log.logService'),
			$this->getService('security.user'), $this->getService('backend.default.TranslatedFormFactory'));
		return $service;
	}


	public function createServiceSettings__settingsRepository(): SettingsModule\Repositories\SettingsRepository
	{
		$service = new SettingsModule\Repositories\SettingsRepository($this->getService('doctrine.default.entityManager'));
		return $service;
	}


	public function createServiceSettings__settingsService(): SettingsModule\Services\SettingsService
	{
		$service = new SettingsModule\Services\SettingsService($this->getService('settings.settingsRepository'));
		return $service;
	}


	public function createServiceTracy__bar(): Tracy\Bar
	{
		$service = Tracy\Debugger::getBar();
		return $service;
	}


	public function createServiceTracy__blueScreen(): Tracy\BlueScreen
	{
		$service = Tracy\Debugger::getBlueScreen();
		return $service;
	}


	public function createServiceTracy__logger(): Tracy\ILogger
	{
		$service = Tracy\Debugger::getLogger();
		return $service;
	}


	public function createServiceTranslation__catalogueCompiler(): Kdyby\Translation\CatalogueCompiler
	{
		$service = new Kdyby\Translation\CatalogueCompiler(new Kdyby\Translation\Caching\PhpFileStorage('C:\MAMP\htdocs\Juno\app/../temp/cache',
			$this->getService('cache.journal')), $this->getService('translation.fallbackResolver'),
			$this->getService('translation.catalogueFactory'));
		$service->enableDebugMode();
		return $service;
	}


	public function createServiceTranslation__catalogueFactory(): Kdyby\Translation\CatalogueFactory
	{
		$service = new Kdyby\Translation\CatalogueFactory($this->getService('translation.fallbackResolver'),
			$this->getService('translation.loader'));
		return $service;
	}


	public function createServiceTranslation__console__extract(): Kdyby\Translation\Console\ExtractCommand
	{
		$service = new Kdyby\Translation\Console\ExtractCommand;
		$service->defaultOutputDir = 'C:\MAMP\htdocs\Juno\app/lang';
		return $service;
	}


	public function createServiceTranslation__default(): Kdyby\Translation\Translator
	{
		$service = new Kdyby\Translation\Translator($this->getService('translation.userLocaleResolver'),
			$this->getService('translation.formatter'), $this->getService('translation.catalogueCompiler'),
			$this->getService('translation.fallbackResolver'), $this->getService('translation.loader'));
		$this->getService('translation.userLocaleResolver.param')->setTranslator($service);
		$service->setDefaultLocale('en');
		$service->setLocaleWhitelist(null);
		$service->setFallbackLocales(['en_US']);
		$this->getService('translation.panel')->register($service);
		$service->addResource('neon', 'C:\MAMP\htdocs\Juno\app\Core\lang\is.en.neon',
			'en', 'is');
		$service->addResource('neon', 'C:\MAMP\htdocs\Juno\app\Core\lang\is.sk.neon',
			'sk', 'is');
		$service->addResource('neon', 'C:\MAMP\htdocs\Juno\app\Core\lang\ublaboo_datagrid.en.neon',
			'en', 'ublaboo_datagrid');
		$service->addResource('neon', 'C:\MAMP\htdocs\Juno\app\Core\lang\ublaboo_datagrid.sk.neon',
			'sk', 'ublaboo_datagrid');
		return $service;
	}


	public function createServiceTranslation__dumper__csv(): Symfony\Component\Translation\Dumper\CsvFileDumper
	{
		$service = new Symfony\Component\Translation\Dumper\CsvFileDumper;
		return $service;
	}


	public function createServiceTranslation__dumper__ini(): Symfony\Component\Translation\Dumper\IniFileDumper
	{
		$service = new Symfony\Component\Translation\Dumper\IniFileDumper;
		return $service;
	}


	public function createServiceTranslation__dumper__mo(): Symfony\Component\Translation\Dumper\MoFileDumper
	{
		$service = new Symfony\Component\Translation\Dumper\MoFileDumper;
		return $service;
	}


	public function createServiceTranslation__dumper__neon(): Kdyby\Translation\Dumper\NeonFileDumper
	{
		$service = new Kdyby\Translation\Dumper\NeonFileDumper;
		return $service;
	}


	public function createServiceTranslation__dumper__php(): Symfony\Component\Translation\Dumper\PhpFileDumper
	{
		$service = new Symfony\Component\Translation\Dumper\PhpFileDumper;
		return $service;
	}


	public function createServiceTranslation__dumper__po(): Symfony\Component\Translation\Dumper\PoFileDumper
	{
		$service = new Symfony\Component\Translation\Dumper\PoFileDumper;
		return $service;
	}


	public function createServiceTranslation__dumper__qt(): Symfony\Component\Translation\Dumper\QtFileDumper
	{
		$service = new Symfony\Component\Translation\Dumper\QtFileDumper;
		return $service;
	}


	public function createServiceTranslation__dumper__res(): Symfony\Component\Translation\Dumper\IcuResFileDumper
	{
		$service = new Symfony\Component\Translation\Dumper\IcuResFileDumper;
		return $service;
	}


	public function createServiceTranslation__dumper__xliff(): Symfony\Component\Translation\Dumper\XliffFileDumper
	{
		$service = new Symfony\Component\Translation\Dumper\XliffFileDumper;
		return $service;
	}


	public function createServiceTranslation__dumper__yml(): Symfony\Component\Translation\Dumper\YamlFileDumper
	{
		$service = new Symfony\Component\Translation\Dumper\YamlFileDumper;
		return $service;
	}


	public function createServiceTranslation__extractor(): Symfony\Component\Translation\Extractor\ChainExtractor
	{
		$service = new Symfony\Component\Translation\Extractor\ChainExtractor;
		$service->addExtractor('latte', $this->getService('translation.extractor.latte'));
		return $service;
	}


	public function createServiceTranslation__extractor__latte(): Kdyby\Translation\Extractors\LatteExtractor
	{
		$service = new Kdyby\Translation\Extractors\LatteExtractor;
		return $service;
	}


	public function createServiceTranslation__fallbackResolver(): Kdyby\Translation\FallbackResolver
	{
		$service = new Kdyby\Translation\FallbackResolver;
		return $service;
	}


	public function createServiceTranslation__formatter(): Symfony\Component\Translation\Formatter\MessageFormatter
	{
		$service = new Symfony\Component\Translation\Formatter\MessageFormatter($this->getService('translation.selector'));
		return $service;
	}


	public function createServiceTranslation__helpers(): Kdyby\Translation\TemplateHelpers
	{
		$service = $this->getService('translation.default')->createTemplateHelpers();
		return $service;
	}


	public function createServiceTranslation__loader(): Kdyby\Translation\TranslationLoader
	{
		$service = new Kdyby\Translation\TranslationLoader;
		$service->injectServiceIds([
			'array' => 'translation.loader.array',
			'php' => 'translation.loader.php',
			'yml' => 'translation.loader.yml',
			'xlf' => 'translation.loader.xlf',
			'po' => 'translation.loader.po',
			'mo' => 'translation.loader.mo',
			'ts' => 'translation.loader.ts',
			'csv' => 'translation.loader.csv',
			'res' => 'translation.loader.res',
			'dat' => 'translation.loader.dat',
			'ini' => 'translation.loader.ini',
			'json' => 'translation.loader.json',
			'neon' => 'translation.loader.neon',
		], $this);
		return $service;
	}


	public function createServiceTranslation__loader__array(): Symfony\Component\Translation\Loader\ArrayLoader
	{
		$service = new Symfony\Component\Translation\Loader\ArrayLoader;
		return $service;
	}


	public function createServiceTranslation__loader__csv(): Symfony\Component\Translation\Loader\CsvFileLoader
	{
		$service = new Symfony\Component\Translation\Loader\CsvFileLoader;
		return $service;
	}


	public function createServiceTranslation__loader__dat(): Symfony\Component\Translation\Loader\IcuDatFileLoader
	{
		$service = new Symfony\Component\Translation\Loader\IcuDatFileLoader;
		return $service;
	}


	public function createServiceTranslation__loader__ini(): Symfony\Component\Translation\Loader\IniFileLoader
	{
		$service = new Symfony\Component\Translation\Loader\IniFileLoader;
		return $service;
	}


	public function createServiceTranslation__loader__json(): Symfony\Component\Translation\Loader\JsonFileLoader
	{
		$service = new Symfony\Component\Translation\Loader\JsonFileLoader;
		return $service;
	}


	public function createServiceTranslation__loader__mo(): Symfony\Component\Translation\Loader\MoFileLoader
	{
		$service = new Symfony\Component\Translation\Loader\MoFileLoader;
		return $service;
	}


	public function createServiceTranslation__loader__neon(): Kdyby\Translation\Loader\NeonFileLoader
	{
		$service = new Kdyby\Translation\Loader\NeonFileLoader;
		return $service;
	}


	public function createServiceTranslation__loader__php(): Symfony\Component\Translation\Loader\PhpFileLoader
	{
		$service = new Symfony\Component\Translation\Loader\PhpFileLoader;
		return $service;
	}


	public function createServiceTranslation__loader__po(): Symfony\Component\Translation\Loader\PoFileLoader
	{
		$service = new Symfony\Component\Translation\Loader\PoFileLoader;
		return $service;
	}


	public function createServiceTranslation__loader__res(): Symfony\Component\Translation\Loader\IcuResFileLoader
	{
		$service = new Symfony\Component\Translation\Loader\IcuResFileLoader;
		return $service;
	}


	public function createServiceTranslation__loader__ts(): Symfony\Component\Translation\Loader\QtFileLoader
	{
		$service = new Symfony\Component\Translation\Loader\QtFileLoader;
		return $service;
	}


	public function createServiceTranslation__loader__xlf(): Symfony\Component\Translation\Loader\XliffFileLoader
	{
		$service = new Symfony\Component\Translation\Loader\XliffFileLoader;
		return $service;
	}


	public function createServiceTranslation__loader__yml(): Symfony\Component\Translation\Loader\YamlFileLoader
	{
		$service = new Symfony\Component\Translation\Loader\YamlFileLoader;
		return $service;
	}


	public function createServiceTranslation__panel(): Kdyby\Translation\Diagnostics\Panel
	{
		$service = new Kdyby\Translation\Diagnostics\Panel('C:\MAMP\htdocs\Juno');
		$service->setLocaleWhitelist(null);
		$service->setLocaleResolvers([
			$this->getService('translation.userLocaleResolver.param'),
			$this->getService('translation.userLocaleResolver.acceptHeader'),
		]);
		return $service;
	}


	public function createServiceTranslation__selector(): Symfony\Component\Translation\MessageSelector
	{
		$service = new Symfony\Component\Translation\MessageSelector;
		return $service;
	}


	public function createServiceTranslation__userLocaleResolver(): Kdyby\Translation\IUserLocaleResolver
	{
		$service = new Kdyby\Translation\LocaleResolver\ChainResolver;
		$service->addResolver($this->getService('translation.userLocaleResolver.acceptHeader'));
		$service->addResolver($this->getService('translation.userLocaleResolver.param'));
		return $service;
	}


	public function createServiceTranslation__userLocaleResolver__acceptHeader(): Kdyby\Translation\LocaleResolver\AcceptHeaderResolver
	{
		$service = new Kdyby\Translation\LocaleResolver\AcceptHeaderResolver($this->getService('http.request'));
		return $service;
	}


	public function createServiceTranslation__userLocaleResolver__param(): Kdyby\Translation\LocaleResolver\LocaleParamResolver
	{
		$service = new Kdyby\Translation\LocaleResolver\LocaleParamResolver;
		return $service;
	}


	public function createServiceTranslation__userLocaleResolver__session(): Kdyby\Translation\LocaleResolver\SessionResolver
	{
		$service = new Kdyby\Translation\LocaleResolver\SessionResolver($this->getService('session.session'),
			$this->getService('http.response'));
		return $service;
	}


	public function createServiceTranslation__writer(): Symfony\Component\Translation\Writer\TranslationWriter
	{
		$service = new Symfony\Component\Translation\Writer\TranslationWriter;
		$service->addDumper('php', $this->getService('translation.dumper.php'));
		$service->addDumper('xliff', $this->getService('translation.dumper.xliff'));
		$service->addDumper('po', $this->getService('translation.dumper.po'));
		$service->addDumper('mo', $this->getService('translation.dumper.mo'));
		$service->addDumper('yml', $this->getService('translation.dumper.yml'));
		$service->addDumper('neon', $this->getService('translation.dumper.neon'));
		$service->addDumper('qt', $this->getService('translation.dumper.qt'));
		$service->addDumper('csv', $this->getService('translation.dumper.csv'));
		$service->addDumper('ini', $this->getService('translation.dumper.ini'));
		$service->addDumper('res', $this->getService('translation.dumper.res'));
		return $service;
	}


	public function createServiceUser__LostPasswordFormFactory(): UserModule\Factories\LostPasswordFormFactory
	{
		$service = new UserModule\Factories\LostPasswordFormFactory($this->getService('log.logService'),
			$this->getService('security.user'), $this->getService('user.userService'),
			$this->getService('backend.default.HydratorService'), $this->getService('backend.default.TranslatedFormFactory'),
			$this->getService('backend.default.MyMailer'));
		return $service;
	}


	public function createServiceUser__userFormFactory(): UserModule\Factories\UserFormFactory
	{
		$service = new UserModule\Factories\UserFormFactory($this->getService('database.default.context'),
			$this->getService('log.logService'), $this->getService('user.userService'),
			$this->getService('multimedia.iMultimediaSaver'), $this->getService('multimedia.multimediaService'),
			$this->getService('security.user'), $this->getService('backend.default.HydratorService'),
			$this->getService('backend.default.TranslatedFormFactory'));
		return $service;
	}


	public function createServiceUser__userRepository(): UserModule\Repositories\UserRepository
	{
		$service = new UserModule\Repositories\UserRepository($this->getService('doctrine.default.entityManager'),
			$this->getService('database.default.context'));
		return $service;
	}


	public function createServiceUser__userService(): UserModule\Services\UserService
	{
		$service = new UserModule\Services\UserService($this->getService('user.userRepository'));
		return $service;
	}


	public function createServiceVisualPaginator__paginator(): IPub\VisualPaginator\Components\IControl
	{
		return new class ($this) implements IPub\VisualPaginator\Components\IControl {
			private $container;


			public function __construct(Container_b2c4047df2 $container)
			{
				$this->container = $container;
			}


			public function create($templateFile = null): IPub\VisualPaginator\Components\Control
			{
				$service = new IPub\VisualPaginator\Components\Control($templateFile);
				$service->injectTranslator($this->container->getService('translation.default'));
				$service->onShowPage = $this->container->getService('events.manager')->createEvent(['IPub\VisualPaginator\Components\Control', 'onShowPage'],
					$service->onShowPage, null, false);
				$service->onAnchor = $this->container->getService('events.manager')->createEvent(['IPub\VisualPaginator\Components\Control', 'onAnchor'],
					$service->onAnchor, null, false);
				return $service;
			}
		};
	}


	public function initialize()
	{
		Kdyby\Doctrine\Proxy\ProxyAutoloader::create('C:\MAMP\htdocs\Juno\app/../temp/proxies', 'Kdyby\GeneratedProxy')->register();Doctrine\Common\Annotations\AnnotationRegistry::registerUniqueLoader("class_exists");
		date_default_timezone_set('Europe/Prague');
		$this->getService('tracy.bar')->addPanel(new Nette\Bridges\DITracy\ContainerPanel($this));
		$this->getService('events.manager')->createEvent(['Nette\DI\Container', 'onInitialize'])->dispatch($this);
		$this->getService('http.response')->setHeader('X-Powered-By', 'Nette Framework');
		$this->getService('http.response')->setHeader('Content-Type', 'text/html; charset=utf-8');
		$this->getService('http.response')->setHeader('X-Frame-Options', 'SAMEORIGIN');
		$this->getService('session.session')->exists() && $this->getService('session.session')->start();
		Tracy\Debugger::$editorMapping = [];
		Tracy\Debugger::setLogger($this->getService('tracy.logger'));
		if ($tmp = $this->getByType("Nette\Http\Session", false)) { $tmp->start(); Tracy\Debugger::dispatch(); };
		Kdyby\Translation\Diagnostics\Panel::registerBluescreen();;

		Kdyby\Doctrine\Diagnostics\Panel::registerBluescreen($this);
		Tracy\Debugger::getBlueScreen()->collapsePaths[] = 'C:\MAMP\htdocs\Juno\vendor\kdyby\doctrine\src\Kdyby\Doctrine';
		Tracy\Debugger::getBlueScreen()->collapsePaths[] = 'C:\MAMP\htdocs\Juno\vendor\doctrine';
		Tracy\Debugger::getBlueScreen()->collapsePaths[] = 'C:\MAMP\htdocs\Juno\app/../temp/proxies';

		Kdyby\Replicator\Container::register();
		WebChemistry\Forms\Controls\Multiplier::register('addMultiplier');
	}
}
